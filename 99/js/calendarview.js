//
// CalendarView (for Prototype)
// calendarview.org
//
// Maintained by Justin Mecham <justin@aspect.net>
//
// Portions Copyright 2002-2005 Mihai Bazon
//
// This calendar is based very loosely on the Dynarch Calendar in that it was
// used as a base, but completely gutted and more or less rewritten in place
// to use the Prototype JavaScript library.
//
// As such, CalendarView is licensed under the terms of the GNU Lesser General
// Public License (LGPL). More information on the Dynarch Calendar can be
// found at:
//
//   www.dynarch.com/projects/calendar
//


var Calendar = Class.create();

//------------------------------------------------------------------------------
// Constants
//------------------------------------------------------------------------------

Calendar.VERSION = '1.2';

Calendar.DAY_NAMES = [
  'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday',
  'Sunday'
];

Calendar.MID_DAY_NAMES = [
  'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
];

Calendar.SHORT_DAY_NAMES = [
  'S', 'M', 'T', 'W', 'T', 'F', 'S', 'S'
];

Calendar.MONTH_NAMES = [
  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
  'September', 'October', 'November', 'December'
];

Calendar.TODAY = "Today";

Calendar.SHORT_MONTH_NAMES = [
  'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
  'Dec' 
];

Calendar.NAV_PREVIOUS_YEAR  = -2;
Calendar.NAV_PREVIOUS_MONTH = -1;
Calendar.NAV_TODAY          =  0;
Calendar.NAV_NEXT_MONTH     =  1;
Calendar.NAV_NEXT_YEAR      =  2;

//------------------------------------------------------------------------------
// Static Methods
//------------------------------------------------------------------------------

// This gets called when the user presses a mouse button anywhere in the
// document, if the calendar is shown. If the click was outside the open
// calendar this function closes it.
Calendar._checkCalendar = function(event) {
  if (!window._popupCalendar){
    return false;      
  }
  if (Element.descendantOf(Event.element(event), window._popupCalendar.container)){
    return;      
  }

  // Don't close the calendar if event target is trigger element
  if (window._popupCalendar.isNewTheme &&
      Element.descendantOf(Event.element(event), window._popupCalendar.triggerElement) ||
      Event.element(event) === window._popupCalendar.triggerElement) {
    event.preventDefault();
    return;
  }
  // Don't close the calendar if event target is trigger input
  if (window._popupCalendar.isNewTheme &&
      Event.element(event) === window._popupCalendar.triggerInputElement) {
    return;
  }

  window._popupCalendar.callCloseHandler();
  return Event.stop(event);
};

//------------------------------------------------------------------------------
// Event Handlers
//------------------------------------------------------------------------------

Calendar.handleMouseDownEvent = function(event)
{
  Event.observe(document, 'mouseup', Calendar.handleMouseUpEvent);
  Event.stop(event);
};

// XXX I am not happy with how clicks of different actions are handled. Need to
// clean this up!
Calendar.handleMouseUpEvent = function(event)
{
  var el        = Event.element(event);
  var calendar  = el.calendar;
  var isNewDate = false;

  // If the element that was clicked on does not have an associated Calendar
  // object, return as we have nothing to do.
  if (!calendar) {
      return false;
  }

  calendar.setTranslatedMonths(calendar.id);
  calendar.shouldClose = false;

  if(el.hasClassName("unselectable")) {
    return false;
  }

  // Clicked on a day
  if (typeof el.navAction == 'undefined')
  {
    if (calendar.currentDateElement) {
      Element.removeClassName(calendar.currentDateElement, 'selected');
      calendar.currentDateElement.setAttribute('tabindex', -1);
      Element.addClassName(el, 'selected');
      el.setAttribute('tabindex', 0);
      calendar.shouldClose = (calendar.currentDateElement == el);
      if (!calendar.shouldClose) {
        calendar.currentDateElement = el;
      }
    }
    calendar.date.setDateOnly(el.date);
    isNewDate = true;
    calendar.shouldClose = !el.hasClassName('otherDay');
    var isOtherMonth     = !calendar.shouldClose;
    if (isOtherMonth) {
      calendar.update(calendar.date);
    }
    calendar.triggerElement.focus();
  }

  // Clicked on an action button
  else
  {
    var date = new Date(calendar.date);

    if (el.navAction == Calendar.NAV_TODAY){
      date.setDateOnly(new Date());        
    }

    var year = date.getFullYear();
    var mon = date.getMonth();
    function setMonth(m) {
      var day = date.getDate();
      var max = date.getMonthDays(m);
      if (day > max) {
          date.setDate(max);
      }
      date.setMonth(m);
    }
    switch (el.navAction) {

      // Previous Year
      case Calendar.NAV_PREVIOUS_YEAR:
        if (year > calendar.minYear){
          date.setFullYear(year - 1);            
        }
        break;

      // Previous Month
      case Calendar.NAV_PREVIOUS_MONTH:
        if (mon > 0) {
          setMonth(mon - 1);
        }
        else if (year-- > calendar.minYear) {
          date.setFullYear(year);
          setMonth(11);
        }
        break;

      // Today
      case Calendar.NAV_TODAY:
        break;

      // Next Month
      case Calendar.NAV_NEXT_MONTH:
        if (mon < 11) {
          setMonth(mon + 1);
        }
        else if (year < calendar.maxYear) {
          date.setFullYear(year + 1);
          setMonth(0);
        }
        break;

      // Next Year
      case Calendar.NAV_NEXT_YEAR:
        if (year < calendar.maxYear){
          date.setFullYear(year + 1);            
        }
        break;

    }

    if (!date.equalsTo(calendar.date)) {
      calendar.setDate(date);
      isNewDate = true;
    } else if (el.navAction === 0) {
      isNewDate = (calendar.shouldClose = true);
    }

    calendar.checkPastAndFuture();

  }

  if (isNewDate) {
      event && calendar.callSelectHandler();
  }
  if (calendar.shouldClose) {
      event && calendar.callCloseHandler();
  }

  Event.stopObserving(document, 'mouseup', Calendar.handleMouseUpEvent);

  return Event.stop(event);
};

Calendar.defaultSelectHandler = function(calendar)
{
  if (!calendar.dateField) {
      return false;
  }

  // Update dateField value
  if (calendar.dateField.tagName == 'DIV') {
      Element.update(calendar.dateField, calendar.date.print(calendar.dateFormat));
  } else if (calendar.dateField.tagName == 'INPUT') {
      calendar.dateField.value = calendar.date.print(calendar.dateFormat);
  }

  // Trigger the onchange callback on the dateField, if one has been defined
  if (typeof calendar.dateField.onchange == 'function'){
    calendar.dateField.onchange();
  }

  // Call the close handler, if necessary
  if (calendar.shouldClose) {
      calendar.callCloseHandler();
  }
};

Calendar.defaultCloseHandler = function(calendar)
{
  calendar.hide();
};

function handlePopupUI(calendar, style) {
  var month = '', year = '';
  var container = calendar.container;
  var title = container.querySelector('.title');
  var nextYear = container.querySelector('.nextYear');
  var prevYear = container.querySelector('.previousYear');
  var nextMonth = container.querySelector('.nextMonth');
  var prevMonth = container.querySelector('.previousMonth');

  if (style) {
    calendar.container.style.width = style.width + 'px';
  }

  if (title && nextYear && nextMonth && prevYear && prevMonth) {
    var dateArray = title.textContent.split(' ');
    month = dateArray.slice(0, dateArray.length - 1).join(' ');
    year = dateArray[dateArray.length - 1];

    var checkHeader = container.querySelectorAll('.calendar-new-header');
    if (checkHeader && checkHeader.length > 0) {
      for (var index = 0; index < checkHeader.length; index++) {
        checkHeader[index].remove();
      }
    }

    var newHeader = document.createElement('div');
    newHeader.classList.add('calendar-new-header');
    newHeader.innerHTML = '<div class="calendar-new-month"><span>'+month+'</span></div><div class="calendar-new-year">'+year+'</div>';
    title.parentNode.insertAdjacentElement('beforebegin', newHeader);

    var newMonthNode = newHeader.querySelector('.calendar-new-month');
    var newYearNode = newHeader.querySelector('.calendar-new-year');
    
    newMonthNode.appendChild(prevMonth);
    newMonthNode.appendChild(nextMonth);

    nextMonth.setAttribute('aria-label', 'Current month is '+month+ ', Next Month')
    prevMonth.setAttribute('aria-label', 'Current month is '+month+ ', Previous Month')

    nextYear.setAttribute('aria-label', 'Current year is '+year+ ', Next Year')
    prevYear.setAttribute('aria-label', 'Current year is '+year+ ', Previous Year')

    newYearNode.appendChild(prevYear);
    newYearNode.appendChild(nextYear);

    title.style.display = 'none';
  }
}

//------------------------------------------------------------------------------
// Calendar Setup
//------------------------------------------------------------------------------

Calendar.setup = function(params)
{  
  Calendar.params = params;
  function param_default(name, def) {
    if (!params[name]) {
        params[name] = def;
    }
  }

  param_default('dateField', null);
  param_default('triggerElement', null);
  param_default('parentElement', null);
  param_default('selectHandler',  null);
  param_default('closeHandler', null);

  var triggerElement = $(params.triggerElement || params.dateField);
  var isNewTheme = triggerElement.getAttribute('data-version') === 'v2';
  var isLiteMode = triggerElement.className.indexOf('icon-liteMode') > -1;
  var isAllowTime = triggerElement.getAttribute('data-allow-time') === 'Yes';
  var questionType = triggerElement.getAttribute('data-qtype') || null;
  var autoCalendar = triggerElement.className.indexOf('showAutoCalendar') > -1;

  var targetElem = triggerElement.parentElement;
  var isLiteModeCalendar = triggerElement.className.indexOf('icon-liteMode') > -1;

  // Add roles and aria-label for the trigger image
  if (isLiteModeCalendar) {
    triggerElement.setAttribute('aria-label', 'Choose Date');
    triggerElement.setAttribute('aria-hidden', false);
    triggerElement.setAttribute('role', 'button');
    triggerElement.setAttribute('tabindex', 0);
  }

  if (!isLiteMode || isAllowTime) {
    targetElem = targetElem.parentElement;
  }

  // In-Page Calendar
  if (params.parentElement)
  {
    var calendar = new Calendar(params.parentElement, params.id);
    calendar.setTranslatedMonths(params.id);
    calendar.setSelectHandler(params.selectHandler || Calendar.defaultSelectHandler);
    if (params.dateFormat){
      calendar.setDateFormat(params.dateFormat);        
    }
    if (params.dateField) {
      calendar.setDateField(params.dateField);
      calendar.parseDate(calendar.dateField.innerHTML || calendar.dateField.value);
    }

    if (params.startOnMonday) {
      calendar.startOnMonday = true;
      calendar.create($(params.parentElement));
    }

    calendar.limits = params.limits;
    if (calendar.limits) {
      calendar.fixCustomLimits();
      calendar.setDynamicLimits();
      calendar.update(calendar.date);
      calendar.checkPastAndFuture();
    }


    calendar.show();
  }

  // Popup Calendars
  //
  // XXX There is significant optimization to be had here by creating the
  // calendar and storing it on the page, but then you will have issues with
  // multiple calendars on the same page.
  else
  {
    var calendar = new Calendar(undefined, params.id);
    calendar.setTranslatedMonths(params.id);
    var triggerInputElement = triggerElement.previousElementSibling;

    if(isNewTheme){
      calendar.isNewTheme = isNewTheme;
      calendar.triggerElement = triggerElement;
      calendar.triggerInputElement = triggerInputElement;
    }
    calendar.limits = params.limits;
    if(calendar.limits) {
      calendar.fixCustomLimits();
      calendar.setDynamicLimits();
    }
    calendar.setSelectHandler(params.selectHandler || Calendar.defaultSelectHandler);
    calendar.setCloseHandler(params.closeHandler || Calendar.defaultCloseHandler);
    calendar.startOnMonday = params.startOnMonday;
    if (params.dateFormat){
      calendar.setDateFormat(params.dateFormat);          
    }
    if (params.dateField) {
      calendar.setDateField(params.dateField);
      calendar.parseDate(calendar.dateField.innerHTML || calendar.dateField.value);
    }
    if (params.dateField){
      Date.parseDate(calendar.dateField.value || calendar.dateField.innerHTML, calendar.dateFormat);          
    }

    if (questionType) {
      calendar.container.setAttribute('data-qtype', questionType);
    }

    if (isNewTheme) {
      if (!isLiteMode || isAllowTime) {
        calendar.container.className += ' extended';
      }
      calendar.container.setAttribute('data-version', 'v2');
      handlePopupUI(calendar, { width: targetElem.offsetWidth });
    }

    function isCalendarOpen(){
      if (calendar.container.style.display === 'none') {
        calendar.callCloseHandler();
        return;
      }
      calendar.callCloseHandler(); 
      setTimeout(function() {
        if (isAllowTime) {
          if (isLiteModeCalendar) {
            calendar.showAtElement(targetElem.querySelector('input[id*="lite_mode_"]'));
          } else {
            calendar.showAtElement(targetElem.querySelector('input[id*="month_"]'));
          }
        } else {
          calendar.showAtElement(targetElem.querySelector('span input'));
        }
      }, 0);
    }

    triggerElement.onclick = triggerCalender;
    
    triggerElement.addEventListener('keydown', (e) => {
      e.stopPropagation();
      if (e.key === 'Enter') {
        triggerCalender(e);
      }
    });

    // open the calendar by clicking the date input (just for the liteMode = off)
    var isLiteMode = triggerElement.className.indexOf('seperatedMode') > -1;
    if(isNewTheme && !isLiteMode && autoCalendar){
      triggerInputElement.onclick = triggerCalender;
    }
  
    function triggerCalender (event) {
      if(calendar.dateField && (
        calendar.dateField.disabled ||
        calendar.dateField.hasClassName('conditionallyDisabled')
      )) {
        return false;
      }

      if (isNewTheme) {
        // if calendar is already opened, close it
        if (calendar.container.style.display !== 'none') {
          calendar.callCloseHandler();
          return;
        }

        handlePopupUI(calendar, { width: targetElem.offsetWidth });
        if (isAllowTime) {
          if (isLiteModeCalendar) {
            calendar.showAtElement(targetElem.querySelector('input[id*="lite_mode_"]'));
          } else {
            calendar.showAtElement(targetElem.querySelector('input[id*="month_"]'));
          }
        } else {
          if (isLiteModeCalendar) {
            targetElem.querySelector('span input').addClassName('calendar-opened');
          }
          calendar.showAtElement(targetElem.querySelector('span input'));
        }
      } else {
        calendar.showAtElement(triggerElement);
      }
      if (isNewTheme) {
        window.onorientationchange = isCalendarOpen;
      }

      var selectedDate = calendar.container.querySelector('td.selected');
      selectedDate.setAttribute('tabindex', 0);
      selectedDate.focus();

      return calendar;
    };

    if(calendar.limits) {
      calendar.update(calendar.date);
      calendar.checkPastAndFuture();
    }

    if(calendar.startOnMonday) {
      calendar.update(calendar.date);
      calendar.create(undefined, params.id);
    }
  }

  try {
    var getDateFromField = function() {
      if(calendar.dateField.id) {
        var id = calendar.dateField.id.replace("year_", "");
        if(!$('month_' + id)) return new Date();
        if (id) {
          calendar.id = id;
        }
        var month = $('month_' + id) ? parseInt($('month_' + id).value)-1 : -1;
        var day = $('day_' + id).value;
        var year = $('year_' + id).value;
        
        if(month > -1 && day && day !== "" && year && year !== "") {
          var dat = new Date(year, month, day, 0, 0, 0);
          if(!calendar.date.equalsTo(dat)) {
            calendar.date = dat;
            calendar.update(calendar.date);
          }
        }
      }
    };
    getDateFromField();
    calendar.dateField.up("li").observe("date:changed", function() {
      getDateFromField();
      if (isNewTheme) {
        handlePopupUI(calendar);
      }
    });
  } catch(e) {
    console.log(e);
  }
  
  return calendar;
};



//------------------------------------------------------------------------------
// Calendar Instance
//------------------------------------------------------------------------------

Calendar.prototype = {

  // The HTML Container Element
  container: null,

  // Callbacks
  selectHandler: null,
  closeHandler: null,
  id: null,

  // Configuration
  minYear: 1900,
  maxYear: 2100,
  dateFormat: '%Y-%m-%d',

  // Dates
  date: new Date(),
  currentDateElement: null,

  // Status
  shouldClose: false,
  isPopup: true,

  dateField: null,

  startOnMonday: false,


  //----------------------------------------------------------------------------
  // Initialize
  //----------------------------------------------------------------------------

  initialize: function(parent, id)
  {
    if (parent){
      this.create($(parent), id);        
    }
    else{
      this.create(undefined, id);        
    }
  },

  fixCustomLimits: function() {

    var fixDate = function(date) {
      if(date.indexOf('today') > -1) {
        return date;
      }
      var arr = date.toString().split("-");
      date = "";
      if(arr.length > 2) {
        date += (arr[0].length === 2 ? "20"+arr[0] : arr[0]) + "-"; //year
      }
      if(arr.length > 1) {
        date += JotForm.addZeros(arr[arr.length-2], 2) + "-"; //month
      }
      date += JotForm.addZeros(arr[arr.length-1], 2); //day
      return date;
    }

    var lim = this.limits;
    if("custom" in lim && lim.custom !== false && lim.custom instanceof Array) {
      for(var i=0; i<lim.custom.length; i++) {
        if(!lim.custom[i]) continue;
        lim.custom[i] = fixDate(lim.custom[i]);
      }
    }

    if("ranges" in lim && lim.ranges !== false && lim.ranges instanceof Array) {
      for(var i=0; i<lim.ranges.length; i++) {
        if(!lim.ranges[i] || lim.ranges[i].indexOf(">") === -1) continue;
        var range = lim.ranges[i].split(">");
        var start = fixDate(range[0]);
        var end = fixDate(range[1]);
        lim.ranges[i] = start + ">" + end;
      }
    }
  },

  setDynamicLimits: function() {

    var getComparativeDate = function(dat) {
      var todayKey = dat.indexOf('today') > -1 ? /today/ : new RegExp(Calendar.TODAY.trim(), 'i');
      if(todayKey.test(dat)) {
        var comp = new Date();
        var offset = parseInt(dat.replace(/\s/g, "").split(todayKey)[1]) || 0;
        comp.setDate(comp.getDate() + offset);

        var getUnselectedDaysCount = function (){
          var curDate = new Date();
          var unselectedDaysCount = 0;
          while (curDate <= comp) {
            var dayName = curDate.toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();
            if (lim.days[dayName] !== undefined && lim.days[dayName] === false){
              unselectedDaysCount++;
            }

            curDate.setDate(curDate.getDate() + 1);
          }
          return unselectedDaysCount;
        }

        if (lim.countSelectedDaysOnly) {
          comp.setDate(comp.getDate() + getUnselectedDaysCount());
        }
        return comp.getFullYear()+"-"+JotForm.addZeros(comp.getMonth()+1, 2)+"-"+JotForm.addZeros(comp.getDate(), 2);
      } else {
        return dat;
      }
    }
    var lim = this.limits
    lim.start = getComparativeDate(lim.start);
    lim.end = getComparativeDate(lim.end);
    
    if("custom" in lim && lim.custom !== false && lim.custom instanceof Array) {
      for(var i=0; i<lim.custom.length; i++) {
        if(!lim.custom[i]) continue;
        lim.custom[i]= getComparativeDate(lim.custom[i]);
      }
    }
    if("ranges" in lim && lim.ranges !== false && lim.ranges instanceof Array) {
      for(var i=0; i<lim.ranges.length; i++) {
        if(!lim.ranges[i] || lim.ranges[i].indexOf(">") === -1) continue;
        var range = lim.ranges[i].split(">");
        start = getComparativeDate(range[0]);
        end = getComparativeDate(range[1]);
        lim.ranges[i] = start + ">" + end;
      }
    }
  },


  //----------------------------------------------------------------------------
  // Update / (Re)initialize Calendar
  //----------------------------------------------------------------------------

  update: function(date)
  {
    var calendar   = this;
    var today      = new Date();
    var thisYear   = today.getFullYear();
    var thisMonth  = today.getMonth();
    var thisDay    = today.getDate();
    var month      = date.getMonth();
    var dayOfMonth = date.getDate();

    this.date = new Date(date);

    // Calculate the first day to display (including the previous month)
    date.setDate(1);
    if(calendar.startOnMonday) {
      date.setDate(-(date.getDay()) - 5);
    } else {
      date.setDate(-(date.getDay()) + 1);
    }

    setTimeout((function() {
      if(this.id) {
        this.container.setAttribute('id', 'calendar_' + this.id);
      }
    }).bind(this), 0);

    // Fill in the days of the month
    Element.getElementsBySelector(this.container, 'tbody tr').each(
      function(row, i) {
        var rowHasDays = false;
        row.immediateDescendants().each(
          function(cell, j) {
            var day            = date.getDate();
            var dayOfWeek      = date.getDay();
            var isCurrentMonth = (date.getMonth() == month);

            // Reset classes on the cell
            cell.className = '';
            cell.date = new Date(date);
            cell.update(day);

            var cellAria = cell.date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            cell.setAttribute('aria-label', cellAria);
            cell.setAttribute('data-date', cell.date.toLocaleDateString("en-US"));
            cell.setAttribute('tabindex', -1);
            // Account for days of the month other than the current month
            if (!isCurrentMonth){
              cell.addClassName('otherDay');
            }
            else{
              rowHasDays = true;                
            }

            // Ensure the current day is selected
            if (isCurrentMonth && day == dayOfMonth) {
              cell.addClassName('selected');
              cell.setAttribute('tabindex', 0)

              calendar.currentDateElement = cell;
            }
            
            var allDays = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

            var makeUnselectable = function() {
              if (date.getFullYear() == thisYear && date.getMonth() == thisMonth && day == thisDay && $$('.todayButton').length > 0){
                $$('.todayButton').first().setStyle({color:"white"});
                $$('.todayButton').first().addClassName("unselectable");
              }

              cell.setOpacity(0.5);
              cell.addClassName("unselectable");
              cell.removeAttribute('tabindex');
            };

            var makeSelectable = function() {
              cell.setOpacity(1);
              cell.removeClassName("unselectable");
            };

            if(calendar.limits) {
              var lim = calendar.limits;

              makeSelectable();

              if(allDays[i] in lim.days && lim.days[allDays[dayOfWeek]] == false) {
                makeUnselectable();
              }

              if("future" in lim && lim.future === false) {
                var now = new Date();
                if (date > now) {
                  makeUnselectable();
                }
              }

              if("past" in lim && lim.past === false) {
                var now = new Date();
                var yesterday = new Date();
                yesterday.setDate(now.getDate()-1);
                if (date < yesterday) {
                  makeUnselectable();
                }
              }

                if("start" in lim && lim.start != false && lim.start != "") {
                    var startDate = false
                    if(lim.start.indexOf("{") > -1) {
                        startDate = JotForm.dateFromField(lim.start);
                    } else {
                        var start = lim.start.split("-");
                        if(start.length == 3) {
                            startDate = new Date(start[0], start[1]-1, start[2]);
                        }
                    }
                    if(date < startDate) makeUnselectable();
                }

                if("end" in lim && lim.end != false && lim.end != "") {

                    var endDate;
                    if(lim.end.indexOf("{") > -1) {
                        endDate = JotForm.dateFromField(lim.end);
                    } else {
                        var end = lim.end.split("-");
                        if(end.length == 3) {
                            var endDate = new Date(end[0], end[1]-1, end[2]);
                        }
                    }
                    if(endDate) {
                        var nextDay = new Date(endDate);
                        nextDay.setDate(endDate.getDate()+1);
                        if(date >= nextDay) {
                            makeUnselectable();
                        }
                    }
                }

                if("custom" in lim && lim.custom !== false && lim.custom instanceof Array) {
                    for(var j=0; j<lim.custom.length; j++) {
                        if(!lim.custom[j]) continue;
                        var m = date.getMonth()+1;
                        m = m < 10 ? "0"+m : m;
                        var d = day < 10 ? "0"+day : day;

                        if(lim.custom[j].indexOf("{") > -1) {
                            var custom = JotForm.dateFromField(lim.custom[j]);
                            custom = JotForm.addZeros(custom.getFullYear(),2)+"-"+JotForm.addZeros(custom.getMonth()+1,2)+"-"+JotForm.addZeros(custom.getDate(), 2);
                            if(custom===date.getFullYear()+"-"+m+"-"+d) makeUnselectable();
                        }

                        if((lim.custom[j] === date.getFullYear()+"-"+m+"-"+d) || //full date
                        (typeof lim.custom[j] == "string" && lim.custom[j].length === 5 && lim.custom[j] === (m+"-"+d)) || //day and month
                        (typeof lim.custom[j] == "string" && lim.custom[j].length === 2 && lim.custom[j] == d)) { //day
                        makeUnselectable();
                        }
                    }
                }
            
                if("ranges" in lim && lim.ranges !== false && lim.ranges instanceof Array) {
                    for(var j=0; j<lim.ranges.length; j++) {
                        if(!lim.ranges[j] || lim.ranges[j].indexOf(">") === -1) continue;
                        var range = lim.ranges[j].split(">");
                        var start = range[0];
                        var end = range[1];

                        var startDate;
                        
                        if(start.indexOf("{") > -1) {
                            startDate = JotForm.dateFromField(start);
                        } else {
                            startDate = start.split("-");
                            startDate = new Date(startDate[0], startDate[1] - 1, startDate[2], 0, 0, 0);
                        }
                        var endDate;
                        if(end.indexOf("{") > -1) {
                            endDate = JotForm.dateFromField(end);
                        } else {
                            endDate = end.split("-");
                            endDate = new Date(endDate[0], endDate[1] - 1, endDate[2], 0, 0, 0);
                        }
                        if(endDate) {
                            endDate.setDate(endDate.getDate()+1);
                            if(date >= startDate && date < endDate) {
                                makeUnselectable();
                            }
                        }
                    }
                }
            }

            // Today
            if (date.getFullYear() == thisYear && date.getMonth() == thisMonth && day == thisDay){
              cell.addClassName('today');                
            }

            // Weekend
            if ([0, 6].indexOf(dayOfWeek) != -1){
              cell.addClassName('weekend');                
            }

            // Set the date to tommorrow
            date.setDate(day + 1);
          }
        );
        // Hide the extra row if it contains only days from another month
        rowHasDays ? row.show() : row.hide();
      }
    );

    if (!JotForm.isSourceTeam && !JotForm.isMarvelTeam) {
      this.container.getElementsBySelector('td.title')[0].update(
        Calendar.MONTH_NAMES[month] + ' ' + this.date.getFullYear()
      );
    } else {
      var titleMonthElement = this.container.querySelector('.titleMonth');
      if (titleMonthElement) titleMonthElement.innerText = Calendar.MONTH_NAMES[month];

      var titleYearElement = this.container.querySelector('.titleYear');
      if (titleYearElement) titleYearElement.innerText = this.date.getFullYear();
    }
  },

  checkPastAndFuture: function() {
    
    var now = new Date();
    var thisYear = now.getFullYear();
    var thisMonth = now.getMonth();
    var selectedYear = this.date.getFullYear();
    var selectedMonth = this.date.getMonth();
    var isNewTheme = this.container.getAttribute('data-version') === 'v2';

    var unselectable = function(el) {
      if(!isNewTheme) {
        el.setStyle({color:"transparent"});
      }
      el.addClassName("unselectable");
    }

    var selectable = function(el) {
      if(!isNewTheme) {
        el.setStyle({color:"#f9621a"});
      }
      el.removeClassName("unselectable");
    }

    if(this.limits) {

      if("future" in this.limits && this.limits.future === false) {

        if(selectedYear >= thisYear) {
          unselectable(this.container.down(".nextYear"));
        } else {
          selectable(this.container.down(".nextYear"));
        }

        if(selectedYear >= thisYear && selectedMonth >= thisMonth) {
          unselectable(this.container.down(".nextMonth"));
        } else { 
          selectable(this.container.down(".nextMonth"));
        }
      }

      if("past" in this.limits && this.limits.past === false) {
        if(selectedYear <= thisYear) {
          unselectable(this.container.down(".previousYear"));
        } else {
          selectable(this.container.down(".previousYear"));
        }

        if(selectedYear <= thisYear && selectedMonth <= thisMonth) {
          unselectable(this.container.down(".previousMonth"));
        } else { 
          selectable(this.container.down(".previousMonth"));
        }
      }
    }
  },

    setNames: function(id) {
        Calendar.DAY_NAMES = JotForm.calendarViewDaysTranslated && JotForm.calendarViewDaysTranslated[id] || JotForm.calenderViewDays && JotForm.calenderViewDays[id] || JotForm.calendarDays || Calendar.DAY_NAMES;
        for(var i=0; i<=7; i++) {
            Calendar.SHORT_DAY_NAMES[i] = Calendar.DAY_NAMES[i % Calendar.DAY_NAMES.length].substring(0,1).toUpperCase();
        }
        if(JotForm.calendarTodayTranslated) {
            Calendar.TODAY = JotForm.calendarTodayTranslated;
        } else if(JotForm.calendarOther && JotForm.calendarOther.today){
            Calendar.TODAY = JotForm.calendarOther.today;
        }
        
    },

    setTranslatedMonths: function(id) {
      Calendar.MONTH_NAMES = JotForm.calendarViewMonthsTranslated && JotForm.calendarViewMonthsTranslated[id] || JotForm.calenderViewMonths && JotForm.calenderViewMonths[id] || JotForm.calendarMonths || Calendar.MONTH_NAMES;
    },


  //----------------------------------------------------------------------------
  // Create/Draw the Calendar HTML Elements
  //----------------------------------------------------------------------------
  create: function(parent, id)
  {
    this.setNames(id);
    // If no parent was specified, assume that we are creating a popup calendar.
    if (!parent) {
      parent = document.getElementsByTagName('body')[0];
      this.isPopup = true;
    } else {
      this.isPopup = false;
    }

    // Calendar Table
    var table = this.table ? this.table.update("") : new Element('table', { role: 'grid' });
    this.table = table;

    // Calendar Header
    var thead = new Element('thead');
    table.appendChild(thead);

    if (!JotForm.isSourceTeam && !JotForm.isMarvelTeam) {
      var row = new Element('tr');
      var cell = new Element('td', { colSpan: 7 });
      cell.addClassName('title');
      row.appendChild(cell);
      thead.appendChild(row);
    }

    // Calendar Navigation
    row = new Element('tr');

    var checkLegacyForm = document.querySelectorAll('.calendar.popup[data-version="v2"]');
    if (checkLegacyForm && checkLegacyForm.length > 0) {
      this._drawButtonCell(row, '&#x00ab;<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-32 h-32"><path fill-rule="evenodd" d="M4.293 8.293a1 1 0 0 1 1.414 0L12 14.586l6.293-6.293a1 1 0 1 1 1.414 1.414l-7 7a1 1 0 0 1-1.414 0l-7-7a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"></path></svg>', 1, Calendar.NAV_PREVIOUS_YEAR, "previousYear");
      this._drawButtonCell(row, '&#x2039;<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-32 h-32"><path fill-rule="evenodd" d="M4.293 8.293a1 1 0 0 1 1.414 0L12 14.586l6.293-6.293a1 1 0 1 1 1.414 1.414l-7 7a1 1 0 0 1-1.414 0l-7-7a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"></path></svg>', 1, Calendar.NAV_PREVIOUS_MONTH, "previousMonth");
      this._drawButtonCell(row, Calendar.TODAY, 3, Calendar.NAV_TODAY, "todayButton");
      this._drawButtonCell(row, '&#x203a;<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-32 h-32"><path fill-rule="evenodd" d="M11.293 7.293a1 1 0 0 1 1.414 0l7 7a1 1 0 0 1-1.414 1.414L12 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414l7-7Z" clip-rule="evenodd"></path></svg>', 1, Calendar.NAV_NEXT_MONTH, "nextMonth");
      this._drawButtonCell(row, '&#x00bb;<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-32 h-32"><path fill-rule="evenodd" d="M11.293 7.293a1 1 0 0 1 1.414 0l7 7a1 1 0 0 1-1.414 1.414L12 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414l7-7Z" clip-rule="evenodd"></path></svg>', 1, Calendar.NAV_NEXT_YEAR, "nextYear");
      table && table.addClassName('calendar-new-header-withSVG');
    } else {
      this._drawButtonCell(row, '&#x00ab;', 1, Calendar.NAV_PREVIOUS_YEAR, "previousYear", 'Previous Yeaer');
      this._drawButtonCell(row, '&#x2039;', 1, Calendar.NAV_PREVIOUS_MONTH, "previousMonth", 'Previous Month');
      this._drawButtonCell(row, Calendar.TODAY, 3, Calendar.NAV_TODAY, "todayButton", 'Today');
      this._drawButtonCell(row, '&#x203a;', 1, Calendar.NAV_NEXT_MONTH, "nextMonth", 'Next Month');
      this._drawButtonCell(row, '&#x00bb;', 1, Calendar.NAV_NEXT_YEAR, "nextYear", 'Next Year');
    }

    thead.appendChild(row);

    // Day Names
    row = new Element('tr');

    var startDay = (this.startOnMonday)?1:0;
    var endDay = (this.startOnMonday)?7:6;

    for (var i = startDay; i <= endDay; ++i) {

      if (JotForm.isMarvelTeam) {
        cell = new Element('th').update(Calendar.MID_DAY_NAMES[i]);
      } else {
        cell = new Element('th').update(Calendar.SHORT_DAY_NAMES[i]);
      }

      if (i === startDay || i == endDay){
        cell.addClassName('weekend');          
      }
      row.appendChild(cell);
    }
    thead.appendChild(row);

    // Calendar Days
    var tbody = table.appendChild(new Element('tbody'));
    for (i = 7; i > 0; --i) {
      row = tbody.appendChild(new Element('tr'));
      row.addClassName('days');
      for (var j = 7; j > 0; --j) {
        cell = row.appendChild(new Element('td', { tabindex: -1 }));  
        cell.calendar = this;
      }
    }

    var isExtended = this.container && this.container.hasClassName('extended');

    // Calendar Container (div)
    this.container = new Element('div');
    this.container.setAttribute('aria-hidden', true);
    this.container.setAttribute('role', 'dialog');
    this.container.setAttribute('aria-modal', true);
    this.container.setAttribute('tabindex', -1);
    this.container.setAttribute('aria-label', 'Choose Date');
    this.container.addClassName('calendar');
  
    if (this.isPopup) {
      this.container.setStyle({ position: 'absolute', display: 'none' });
      this.container.addClassName('popup');
    }
    if(isExtended) {
      this.container.addClassName('extended');
    }
    this.container.appendChild(table);

    // Initialize Calendar
    this.update(this.date);

    // Observe the container for mousedown events
    Event.observe(this.container, 'mousedown', Calendar.handleMouseDownEvent);

    // Append to parent element
    parent.appendChild(this.container);
  },

  _drawButtonCell: function(parent, text, colSpan, navAction, extraClass, ariaLabel = '')
  {
    var cell          = new Element('button');
    if (colSpan > 1) {
        cell.colSpan = colSpan;
    }
    cell.className    = 'button' + (extraClass ? " " + extraClass : "");
    cell.calendar     = this;
    cell.navAction    = navAction;
    cell.innerHTML    = text;
    cell.ariaLabel    = ariaLabel;
    cell.unselectable = 'on'; // IE
    parent.appendChild(cell);
    return cell;
  },

  _drawButtonCellasDiv: function(parent, text, colSpan, navAction, extraClass)
  {
    var cell          = new Element('div');
    if (colSpan > 1) {
        cell.colSpan = colSpan;
    }
    cell.className    = 'button' + (extraClass ? " " + extraClass : "");
    cell.calendar     = this;
    cell.navAction    = navAction;
    cell.innerHTML    = text;
    cell.unselectable = 'on'; // IE
    parent.appendChild(cell);
    return cell;
  },



  //------------------------------------------------------------------------------
  // Callbacks
  //------------------------------------------------------------------------------

  // Calls the Select Handler (if defined)
  callSelectHandler: function()
  {
    if (this.selectHandler){
      this.selectHandler(this, this.date.print(this.dateFormat));
      var isNewTheme = this.container.getAttribute('data-version') === 'v2';
      if (isNewTheme) {
        handlePopupUI(this);
      }
    }
  },

  // Calls the Close Handler (if defined)
  callCloseHandler: function()
  {
    if (this.closeHandler){
      this.closeHandler(this);        
    }
  },



  //------------------------------------------------------------------------------
  // Calendar Display Functions
  //------------------------------------------------------------------------------

  // Handle Keyboard Events
  handleDayKeydown: function(e) {
    var activeDay = document.activeElement?.getAttribute('data-date');
    var calendarNode = this.container;
    var isButtonActiveElement = document.activeElement.closest('.calendar-new-header') ? document.activeElement : false;

    var days = calendarNode.querySelectorAll('.days td:not(.unslectable)');
    var index =  Array.from(days).findIndex(d => d.getAttribute('data-date') === activeDay); 

    if (!calendarNode) {
      return;
    }

    if (e.key === 'Escape') {
      this.triggerElement.focus();
      this.hide();
      return;
    }

    if (e.key ===  'Tab' && calendarNode && activeDay) {
      calendarNode.focus();
    }
    
    if (e.key === 'Enter' || e.key === 'Space') {
      if (activeDay) {
        this.triggerElement.focus();
        // triggerElement.setAttribute('aria-label', 'Change date, '+ new Date(activeDay).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }));
        this.hide();
      }
    
      Calendar.handleMouseUpEvent(e);
  
      if (isButtonActiveElement) {
        isButtonActiveElement.focus();
      }
    }

    // day navigation with arrow keys
    var keyMap = {
      ArrowRight: [index + 1, 0],
      ArrowDown: [index + 7, 0],
      ArrowLeft: [index - 1, days.length - 1],
      ArrowUp: [index - 7, days.length - 1],
    };

    if (!keyMap[e.key] || !activeDay) return;
  
    var key = keyMap[e.key];
    var nextDay = key[0];
    var defaultDay = key[1];
    days[nextDay] ? days[nextDay].focus() : days[defaultDay].focus();
  },

  makeAccessible: function() {
    this.container.setAttribute('aria-hidden', false);
    this.update(this.date);

    var selectedDate = document.querySelector('td.selected');
    selectedDate.setAttribute('aria-label', this.date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + ' selected');
    document.addEventListener('keydown', this.handleDayKeydown)
  },

  // Shows the Calendar
  show: function()
  {
    // this.create();
    this.container.show();
    this.handleDayKeydown = this.handleDayKeydown.bind(this);
    this.makeAccessible = this.makeAccessible.bind(this);
    
    this.makeAccessible();
    if (this.isPopup) {
      window._popupCalendar = this;
      Event.observe(document, 'mousedown', Calendar._checkCalendar);
      Event.observe(document, 'touchstart', Calendar._checkCalendar);
    }
  },

  // Shows the calendar at the given absolute position
  showAt: function (x, y)
  {    
    this.show();
    this.container.setStyle({ left: x + 'px', top: y + 'px' });
  },

  // Shows the Calendar at the coordinates of the provided element
  showAtElement: function(element)
  {
    var firstElement = element.up('span').down('input') || element.up('div').down('input');

    if(firstElement.up('div').visible() === false){
      firstElement = element; 
    }

    var firstPos = Position.cumulativeOffset(firstElement);
    var x = firstPos[0] + 40;
    var y = firstPos[1] + 100 + firstElement.getHeight();

    if(element.id.match(/_pick$/)) {
      var elPos = Position.cumulativeOffset(element);
      var elX = elPos[0] - 140;
      if(elX > x) x = elX;
      y = elPos[1] + 100 + element.getHeight();
    }
    this.showAt(x, y);
  },

  // Hides the Calendar
  hide: function()
  {
    if (this.isPopup){
      Event.stopObserving(document, 'mousedown', Calendar._checkCalendar);        
      Event.stopObserving(document, 'touchstart', Calendar._checkCalendar);
    }

    document.removeEventListener('keydown', this.handleDayKeydown);
    this.container.hide();
    this.container.setAttribute('aria-hidden', true);
  },



  //------------------------------------------------------------------------------
  // Miscellaneous
  //------------------------------------------------------------------------------

  // Tries to identify the date represented in a string.  If successful it also
  // calls this.setDate which moves the calendar to the given date.
  parseDate: function(str, format)
  {
    if (!format){
      format = this.dateFormat;        
    }
    this.setDate(Date.parseDate(str, format));
  },



  //------------------------------------------------------------------------------
  // Getters/Setters
  //------------------------------------------------------------------------------

  setSelectHandler: function(selectHandler)
  {
    this.selectHandler = selectHandler;
  },

  setCloseHandler: function(closeHandler)
  {
    this.closeHandler = closeHandler;
  },

  setDate: function(date)
  {
    if (!date.equalsTo(this.date)){
      this.update(date);        
      var isNewTheme = this.container.getAttribute('data-version') === 'v2';
      if (isNewTheme) {
        handlePopupUI(this);
      }  
    }
  },

  setDateFormat: function(format)
  {
    this.dateFormat = format;
  },

  setDateField: function(field)
  {
    this.dateField = $(field);
  },

  setRange: function(minYear, maxYear)
  {
    this.minYear = minYear;
    this.maxYear = maxYear;
  }

};

// global object that remembers the calendar
window._popupCalendar = null;

//==============================================================================
//
// Date Object Patches
//
// This is pretty much untouched from the original. I really would like to get
// rid of these patches if at all possible and find a cleaner way of
// accomplishing the same things. It's a shame Prototype doesn't extend Date at
// all.
//
//==============================================================================

Date.DAYS_IN_MONTH = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
Date.SECOND        = 1000; /* milliseconds */
Date.MINUTE        = 60 * Date.SECOND;
Date.HOUR          = 60 * Date.MINUTE;
Date.DAY           = 24 * Date.HOUR;
Date.WEEK          =  7 * Date.DAY;

// Parses Date
Date.parseDate = function(str, fmt) {
  var today = new Date();
  var y     = 0;
  var m     = -1;
  var d     = 0;
  var a     = str.split(/\W+/);
  var b     = fmt.match(/%./g);
  var i     = 0, j = 0;
  var hr    = 0;
  var min   = 0;

  for (i = 0; i < a.length; ++i) {
    if (!a[i]) {
        continue;
    }
    switch (b[i]) {
      case "%d":
      case "%e":
        d = parseInt(a[i], 10);
        break;
      case "%m":
        m = parseInt(a[i], 10) - 1;
        break;
      case "%Y":
      case "%y":
        y = parseInt(a[i], 10);
        (y < 100) && (y += (y > 29) ? 1900 : 2000);
        break;
      case "%b":
      case "%B":
        for (j = 0; j < 12; ++j) {
          if (Calendar.MONTH_NAMES[j].substr(0, a[i].length).toLowerCase() == a[i].toLowerCase()) {
            m = j;
            break;
          }
        }
        break;
      case "%H":
      case "%I":
      case "%k":
      case "%l":
        hr = parseInt(a[i], 10);
        break;
      case "%P":
      case "%p":
        if (/pm/i.test(a[i]) && hr < 12){
          hr += 12;            
        }
        else if (/am/i.test(a[i]) && hr >= 12){
          hr -= 12;            
        }
        break;
      case "%M":
        min = parseInt(a[i], 10);
        break;
    }
  }
  if (isNaN(y)) {
      y = today.getFullYear();
  }
  if (isNaN(m)) {
      m = today.getMonth();
  }
  if (isNaN(d)) {
      d = today.getDate();
  }
  if (isNaN(hr)) {
      hr = today.getHours();
  }
  if (isNaN(min)) {
      min = today.getMinutes();
  }
  if (y != 0 && m != -1 && d != 0){
    return new Date(y, m, d, hr, min, 0);      
  }
  y = 0; m = -1; d = 0;
  for (i = 0; i < a.length; ++i) {
    if (a[i].search(/[a-zA-Z]+/) != -1) {
      var t = -1;
      for (j = 0; j < 12; ++j) {
        if (Calendar.MONTH_NAMES[j].substr(0, a[i].length).toLowerCase() == a[i].toLowerCase()) { t = j; break; }
      }
      if (t != -1) {
        if (m != -1) {
          d = m+1;
        }
        m = t;
      }
    } else if (parseInt(a[i], 10) <= 12 && m == -1) {
      m = a[i]-1;
    } else if (parseInt(a[i], 10) > 31 && y == 0) {
      y = parseInt(a[i], 10);
      (y < 100) && (y += (y > 29) ? 1900 : 2000);
    } else if (d == 0) {
      d = a[i];
    }
  }
  if (y == 0){
    y = today.getFullYear();      
  }
  if (m != -1 && d != 0){
    return new Date(y, m, d, hr, min, 0);      
  }
  return today;
};

// Returns the number of days in the current month
Date.prototype.getMonthDays = function(month) {
  var year = this.getFullYear();
  if (typeof month == "undefined"){
    month = this.getMonth();      
  }
  if (((0 == (year % 4)) && ( (0 != (year % 100)) || (0 == (year % 400)))) && month == 1){
    return 29;      
  }
  else{
    return Date.DAYS_IN_MONTH[month];      
  }
};

// Returns the number of day in the year
Date.prototype.getDayOfYear = function() {
  var now = new Date(this.getFullYear(), this.getMonth(), this.getDate(), 0, 0, 0);
  var then = new Date(this.getFullYear(), 0, 0, 0, 0, 0);
  var time = now - then;
  return Math.floor(time / Date.DAY);
};

/** Returns the number of the week in year, as defined in ISO 8601. */
Date.prototype.getWeekNumber = function() {
  var d = new Date(this.getFullYear(), this.getMonth(), this.getDate(), 0, 0, 0);
  var DoW = d.getDay();
  d.setDate(d.getDate() - (DoW + 6) % 7 + 3); // Nearest Thu
  var ms = d.valueOf(); // GMT
  d.setMonth(0);
  d.setDate(4); // Thu in Week 1
  return Math.round((ms - d.valueOf()) / (7 * 864e5)) + 1;
};

/** Checks date and time equality */
Date.prototype.equalsTo = function(date) {
  return ((this.getFullYear() == date.getFullYear()) &&
   (this.getMonth() == date.getMonth()) &&
   (this.getDate() == date.getDate()) &&
   (this.getHours() == date.getHours()) &&
   (this.getMinutes() == date.getMinutes()));
};

/** Set only the year, month, date parts (keep existing time) */
Date.prototype.setDateOnly = function(date) {
  var tmp = new Date(date);
  this.setDate(1);
  this.setFullYear(tmp.getFullYear());
  this.setMonth(tmp.getMonth());
  this.setDate(tmp.getDate());
};

/** Prints the date in a string according to the given format. */
Date.prototype.print = function (str) {
  var m = this.getMonth();
  var d = this.getDate();
  var y = this.getFullYear();
  var wn = this.getWeekNumber();
  var w = this.getDay();
  var s = {};
  var hr = this.getHours();
  var pm = (hr >= 12);
  var ir = (pm) ? (hr - 12) : hr;
  var dy = this.getDayOfYear();
  if (ir == 0){
    ir = 12;      
  }
  var min = this.getMinutes();
  var sec = this.getSeconds();
  s["%a"] = Calendar.SHORT_DAY_NAMES[w]; // abbreviated weekday name [FIXME: I18N]
  s["%A"] = Calendar.DAY_NAMES[w]; // full weekday name
  s["%b"] = Calendar.SHORT_MONTH_NAMES[m]; // abbreviated month name [FIXME: I18N]
  s["%B"] = Calendar.MONTH_NAMES[m]; // full month name
  // FIXME: %c : preferred date and time representation for the current locale
  s["%C"] = 1 + Math.floor(y / 100); // the century number
  s["%d"] = (d < 10) ? ("0" + d) : d; // the day of the month (range 01 to 31)
  s["%e"] = d; // the day of the month (range 1 to 31)
  // FIXME: %D : american date style: %m/%d/%y
  // FIXME: %E, %F, %G, %g, %h (man strftime)
  s["%H"] = (hr < 10) ? ("0" + hr) : hr; // hour, range 00 to 23 (24h format)
  s["%I"] = (ir < 10) ? ("0" + ir) : ir; // hour, range 01 to 12 (12h format)
  s["%j"] = (dy < 100) ? ((dy < 10) ? ("00" + dy) : ("0" + dy)) : dy; // day of the year (range 001 to 366)
  s["%k"] = hr;   // hour, range 0 to 23 (24h format)
  s["%l"] = ir;   // hour, range 1 to 12 (12h format)
  s["%m"] = (m < 9) ? ("0" + (1+m)) : (1+m); // month, range 01 to 12
  s["%M"] = (min < 10) ? ("0" + min) : min; // minute, range 00 to 59
  s["%n"] = "\n";   // a newline character
  s["%p"] = pm ? "PM" : "AM";
  s["%P"] = pm ? "pm" : "am";
  // FIXME: %r : the time in am/pm notation %I:%M:%S %p
  // FIXME: %R : the time in 24-hour notation %H:%M
  s["%s"] = Math.floor(this.getTime() / 1000);
  s["%S"] = (sec < 10) ? ("0" + sec) : sec; // seconds, range 00 to 59
  s["%t"] = "\t";   // a tab character
  // FIXME: %T : the time in 24-hour notation (%H:%M:%S)
  s["%U"] = s["%W"] = s["%V"] = (wn < 10) ? ("0" + wn) : wn;
  s["%u"] = w + 1;  // the day of the week (range 1 to 7, 1 = MON)
  s["%w"] = w;    // the day of the week (range 0 to 6, 0 = SUN)
  // FIXME: %x : preferred date representation for the current locale without the time
  // FIXME: %X : preferred time representation for the current locale without the date
  s["%y"] = ('' + y).substr(2, 2); // year without the century (range 00 to 99)
  s["%Y"] = y;    // year with the century
  s["%%"] = "%";    // a literal '%' character

  return str.gsub(/%./, function(match) { return s[match] || match; });
};

Date.prototype.__msh_oldSetFullYear = Date.prototype.setFullYear;
Date.prototype.setFullYear = function(y) {
  var d = new Date(this);
  d.__msh_oldSetFullYear(y);
  if (d.getMonth() != this.getMonth()){
    this.setDate(28);      
  }
  this.__msh_oldSetFullYear(y);
};
