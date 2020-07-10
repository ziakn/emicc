import Vue from 'vue'
import Vuetify from 'vuetify'
// To add vuetify css file
import colors from 'vuetify/lib/util/colors'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader

Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi'|| 'mdiSvg' || 'md'
      },
      theme: {
        themes: {
          light: {
            primary: colors.red.darken4,
          secondary: colors.grey.darken1,
          accent: colors.shades.black,
          error: colors.red.accent3,
          },
        },
      },
}

export default new Vuetify(opts)