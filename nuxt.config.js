require('dotenv').config()
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: 'Высоконагруженные сайты, мобильные приложения, игры, дизайн, брендинг, продвижение',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {
        hid: 'description',
        name: 'description',
        content: 'APPELSIN - это digital студия, занимающаяся разработкой комплексных омниканальных IT-решений. Создание самых современных сайтов, сложных высоконагруженных веб-сервисов и серверных решений, мобильных приложений и игр, дизайна и брендинга, а также реклама и продвижение.'
      },
      {
        name: 'og:title',
        content: 'разработка комплексных IT-решений'
      },
      {
        name: 'og:description',
        content: 'Создание современных сайтов, сложных высоконагруженных веб-сервисов и серверных решений, мобильных приложений и игр, дизайна и брендинга, а также реклама и продвижение.'
      },
      {
        name: 'og:url',
        content: 'https://appelsin.tech'
      },
      {
        name: 'og:image',
        content: 'https://appelsin.tech/pageimage.jpg'
      },
      {
        name: 'og:site_name',
        content: 'Appelsin.tech'
      },
      {
        name: 'og:locale',
        content: 'ru_RU'
      },
      {
        name: 'fb:app_id',
        content: 'appelsintech'
      },
      {
        name: 'og:type',
        content: 'website'
      },
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.png'}
    ],
    script: [
      { src: 'https://www.googletagmanager.com/gtag/js?id=UA-148074822-1', async: true },
      { src: '//code.jivosite.com/widget.js', 'data-jv-id': 'q1cQchWvXF', async: true },
      {
        type: 'application/ld+json',
        json: {
          "@context": "http://schema.org",
          "@type": "Organization",
          "url": "https://appelsin.tech",
          "name": "Digital студия APPELSIN",
          "description": "Разработка комплексных омниканальных IT-решений. Создание самых современных сайтов, сложных высоконагруженных веб-сервисов и серверных решений, мобильных приложений и игр, дизайна и брендинга, а также реклама и продвижение",
          "logo": "https://appelsin.tech/logo.png",
          "contactPoint": {
            "telephone": "+7(964)495-29-29",
            "contactType": "Customer service"
          },
          "email": "info@appelsin.tech",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Москва",
            "addressRegion": "Московская область",
            "streetAddress": "ул. Кировоградская 9к1 с3"
          },
          "sameAs" : [
            "https://vk.com/appelsin_tech/",
            "https://www.facebook.com/Appelsintech/",
            "https://www.instagram.com/appelsin_tech/",
            "https://www.youtube.com/channel/UCt8CyzxKiuecJk_i2f3_rSA"]
        }
      }
    ],
  },
  /*
  ** Customize the progress-bar color
  */
  loading: false,
  /*
  ** Global CSS
  */
  css: [
    'swiper/dist/css/swiper.css',
    '~/assets/less/main.less'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    {src: '@/plugins/swiper', mode: 'client'},
    '@/plugins/eventBus',
    '@/plugins/vue-js-modal',
    '@/plugins/i18n.js'
  ],
  router: {
    middleware: 'i18n'
  },
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    '@nuxtjs/dotenv'
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/svg',
    '@nuxtjs/recaptcha',
    'nuxt-fullpage.js',
    // [
    //   '@nuxtjs/yandex-metrika',
    //   {
    //     id: 54742102,
    //     webvisor: true,
    //     clickmap:true,
    //     useCDN:false,
    //     trackLinks:true,
    //     accurateTrackBounce:true,
    //   }
    // ],
  ],
  recaptcha: {
    hideBadge: true, // Hide badge element (v3)
    siteKey: '6Let_LkUAAAAAKLC9bqNGPiUs_ZQxhklNW_Hxlvm',    // Site key for requests
    version: 3     // Version
  },
  axios: {
    // proxyHeaders: false
  },
  /*
  ** Build configuration
  */
  generate: {
    routes: ['/', '/en']
  },
  build: {
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}
