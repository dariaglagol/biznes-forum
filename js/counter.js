'use strict';
(function() {
  var targetDate = new Date('Oct 27, 2017 00:00:00');
  initializeClock('countdown', targetDate);
  
  function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
  }

  function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector('.timer__item--days');
    var hoursSpan = clock.querySelector('.timer__item--hours');
    var minutesSpan = clock.querySelector('.timer__item--minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
      var time = getTimeRemaining(endtime);  
      if (time.total <= 0) {
        clearInterval(timeinterval);
      }
      if (time.days < 10) {
        daysSpan.innerHTML = ('0' + time.days).slice(-2);
      }
      else {
        daysSpan.innerHTML = time.days;
      }
      hoursSpan.innerHTML = ('0' + time.hours).slice(-2);
      minutesSpan.innerHTML = ('0' + time.minutes).slice(-2);
    }
    var remaining = getTimeRemaining(endtime);
    if(remaining.total > 0) {
      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }
  }
})();