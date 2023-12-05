(() => {
    function timer() {
        const timers = document.querySelectorAll('[data-timer]');
        if (timers.length)
            timers.forEach(timer => {
                const deadline = timer.dataset.timer;
                setClock();
                function getTimeRemainig(andTime) {
                    const t = Date.parse(andTime) - new Date();
                    const days = Math.floor(t / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((t / (1000 * 60)) % 60);
                    const seconds = Math.floor((t / 1000) % 60);
                    return {
                        total: t,
                        days,
                        hours,
                        minutes,
                        seconds,
                    };
                }
                function getZero(num) {
                    if (num < 10) return `0${num}`;
                    else return num;
                }
                function setClock() {
                    const days = timer.querySelector('[data-timer-value="days"]');
                    const hours = timer.querySelector('[data-timer-value="hours"]');
                    const minutes = timer.querySelector('[data-timer-value="minutes"]');
                    const seconds = timer.querySelector('[data-timer-value="seconds"]');
                    const timeInterval = setInterval(updateClock, 1000);
                    updateClock();
                    function updateClock() {
                        const t = getTimeRemainig(deadline);
                        days.textContent = getZero(t.days);
                        hours.textContent = getZero(t.hours);
                        minutes.textContent = getZero(t.minutes);
                        seconds.textContent = getZero(t.seconds);
                        if (t.total <= 0) {
                            clearInterval(timeInterval);
                            days.textContent = "00";
                            hours.textContent = "00";
                            minutes.textContent = "00";
                            seconds.textContent = "00";
                        }
                    }
                }
            });
    }
    timer();
})();
