/*! ========= INFORMATION ============================
    - document:  Wow Herd Effects Pro
	- brand:     Wow-Company
	- brand-url: https://wow-company.com/
    - store-url: https://wow-estore.com/
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com/item/wow-herd-effects-pro/
==================================================== */

'use strict';

class HerdEffects {

    constructor(element, options = {}) {

        const _default = {
            variables: {
                amount: [1000, 2500],
                1: ['Emma', 'Noah', 'Olivia', 'Liam', 'Ava', 'William'],
                2: ['Bangkok', 'London', 'Paris', 'Dubai', 'New York', 'Singapore'],
            },
            openTime: {
                type: 'stable',
                min: 5, // seconds
                max: 10, // seconds
            },
            closeTime: 7, // autoclose notification time
            number: 3, // number of notification
            animation: {
                open: 'bounceIn',
                close: 'bounceOut',
            },
            link: {
                enabled: false,
                content: 'https://wow-estore.com/item/wow-herd-effects-pro/',
                target: '_blank',
                hide: false,
            },
            geotargeting: {
                enabled: false,
                countries: [],
            },
            screenMax: {
                enabled: false,
                breakpoint: 1024,
            },
            screenMin: {
                enabled: false,
                breakpoint: 480,
            },
            style: {},
        };

        this.element = element;
        this.elementId = element.getAttribute('id');
        this.textBox = element.querySelector('.wow-notification-text-block');
        this.context = this.textBox.innerHTML;
        this.closeBtn = element.querySelector('.wow-notification-close');

        this.number = this.getStorage('number');
        this.checkClose = this.getStorage('checkClose');
        this.settings = Object.assign(_default, options);
        this.screen = screen.width

        this.init().catch(error => console.error(error));
    }

    async init() {
        let geo = await this.geoTargeting();
        this.style();
        if ((this.settings.number === 0 || (this.number < this.settings.number && this.checkClose === 0)) && geo === true && this.checkDevices() === true) {
            this.open();
        }
        this.clickClose();
        this.setLink();
    }

    style() {
        this.element.style.cssText = this.objectToString(this.settings.style);
    }

    setLink() {
        if (this.settings.link.enabled !== true) {
            return;
        }
        this.element.addEventListener('click', function (event) {
            if (event.target === this.closeBtn) {
                return;
            }

            if (this.settings.link.hide === true) {
                this.forceClose();
            }

            window.open(this.settings.link.content, this.settings.link.target);

        }.bind(this));

        this.element.classList.add('is-clickable');

    }

    clickClose() {
        if (this.closeBtn === null) {
            return;
        }

        this.closeBtn.addEventListener('click', function () {
            this.forceClose();
        }.bind(this));
    }

    forceClose() {
        this.checkClose++;
        this.setStorage('checkClose', this.checkClose);
        this.element.classList.remove(this.settings.animation.open);
        this.element.classList.add(this.settings.animation.close);
        this.element.classList.add('is-deactivated');
    }

    open() {
        const time = this.getTime();
        setTimeout(function () {
            this.element.classList.remove(this.settings.animation.close);
            this.element.classList.add('is-activated');
            this.element.classList.add(this.settings.animation.open);
            this.inputContent();
            this.close();
            this.number++;
            this.setStorage('number', this.number);
        }.bind(this), time);
    }

    close() {
        const time = parseInt(this.settings.closeTime) * 1000;
        setTimeout(function () {
            this.element.classList.remove(this.settings.animation.open);
            this.element.classList.add(this.settings.animation.close);
            setTimeout(function () {
                this.element.classList.remove('is-activated');
            }.bind(this), 1000);
            if (this.settings.number === 0 || (this.number < this.settings.number && this.checkClose === 0)) {
                this.open();
            }
        }.bind(this), time);

    }

    inputContent() {
        let content = this.context;

        for (let [key, value] of Object.entries(this.settings.variables)) {
            if (isNaN(key) && content.includes(`[${key}]`)) {
                const random = Math.floor(
                        Math.random() *
                        (parseFloat(this.settings.variables.amount[0]) - parseFloat(this.settings.variables.amount[1]))) +
                    parseFloat(this.settings.variables.amount[1]);
                content = content.replace('[amount]', random);
                continue;
            }

            if (content.includes(`[variable_${key}]`)) {
                const variable = new RegExp(`\\[variable_${key}\\]`, 'g');
                const random = Math.floor(Math.random() * value.length);
                content = content.replace(variable, value[random]);
            }
        }
        this.textBox.innerHTML = content;
    }

    getTime() {
        if (this.settings.openTime.type === 'stable') {
            return parseInt(this.settings.openTime.min) * 1000;
        }
        return (Math.floor(
                Math.random() * (parseFloat(this.settings.openTime.max) - parseFloat(this.settings.openTime.min))) +
            parseFloat(this.settings.openTime.min)) * 1000;
    }

    setStorage(name, value) {
        let object = JSON.parse(sessionStorage.getItem(this.elementId));
        if (object === null) {
            object = {};
        }
        object[name] = value;
        sessionStorage.setItem(this.elementId, JSON.stringify(object));
    }

    getStorage(name) {
        let result = JSON.parse(sessionStorage.getItem(this.elementId));
        if (result === null || result[name] === null || isNaN(result[name])) {
            return 0;
        }

        return parseInt(result[name]);
    }

    geoTargeting() {
        if (this.settings.geotargeting.enabled !== true) {
            return true;
        }
        return new Promise((resolve, reject) => {
            fetch('https://get.geojs.io/v1/ip/country.json')
                .then(response => response.json())
                .then(data => {
                    if (this.settings.geotargeting.countries.includes(data.country)) {
                        resolve(true);
                    } else {
                        resolve(false);
                    }
                })
                .catch(error => {
                    resolve(true);
                });

        });
    }

    checkDevices() {
        if (this.settings.screenMax.enabled === true && this.settings.screenMax.breakpoint < this.screen) {
            return false;
        }

        return !(this.settings.screenMin.enabled === true && this.settings.screenMin.breakpoint > this.screen);


    }

    objectToString(obj) {
        let str = '';
        for (let key in obj) {
            str += key + ':' + obj[key] + ';';
        }
        return str;
    }

}

document.addEventListener('DOMContentLoaded', function () {
    if (typeof HerdEffectsObj !== 'undefined') {
        for (var id in HerdEffectsObj) {
            const element = document.getElementById(id);
            const options = HerdEffectsObj[id];
            new HerdEffects(element, options);
        }
    }
});