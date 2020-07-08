import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)
    //var language=(window.authUser.language)
var language = 'en';
var selection = '';
if (language) {
    selection = require('./language/' + language + '.lang')
} else {
    selection = require('./language/en.lang')
}
const messages = {
    locale: {
        message: selection
    }
}
const i18n = new VueI18n({
    locale: 'locale',
    messages,
})
export default i18n;