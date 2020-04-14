export const state = () => ({
  locales: ['en', 'ru'],
  locale: 'ru',
  sendMail: false
})

export const actions = {
  setSuccessMail({commit}) {
    commit('SEND_MAIL')
  }
}

export const mutations = {
  SET_LANG (state, locale) {
    if (state.locales.includes(locale)) {
      state.locale = locale
    }
  },
  SEND_MAIL (state) {
    state.sendMail = true
  }
}
