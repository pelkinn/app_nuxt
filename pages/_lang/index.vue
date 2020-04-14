<template>
  <div>
    <div id="nav-menu" class="navigation-wrapper">
      <button class="arrow next-slide" @click="prevSlide"></button>
      <ul id="mainMenu" class="main-nav-menu">
        <li data-menuanchor="main" class="active">
          <a class="link-section" href="#main"></a>
        </li>
        <li data-menuanchor="services">
          <a class="link-section" href="#services"></a>
        </li>
        <li data-menuanchor="cases">
          <a class="link-section" href="#cases"></a>
        </li>
        <li data-menuanchor="price">
          <a class="link-section" href="#price"></a>
        </li>
        <li data-menuanchor="about">
          <a class="link-section" href="#about"></a>
        </li>
        <li data-menuanchor="contacts">
          <a class="link-section" href="#contacts"></a>
        </li>
      </ul>
      <button class="arrow prev-slide" @click="nextSlide"></button>
    </div>
    <full-page :options="options" id="fullpage">
      <main-hero/>
      <main-services :fullPageReady="fullPageReady" :resize="resize"/>
      <main-cases :fullPageReady="fullPageReady" :resize="resize"/>
      <main-price/>
      <main-about :fullPageReady="fullPageReady" :resize="resize"/>
      <main-contacts/>
    </full-page>
  </div>
</template>

<script>

  import MainHeader from '~/components/main/MainHeader'
  import MainHero from '~/components/main/MainHero'
  import MainServices from '~/components/main/MainServices'
  import MainCases from '~/components/main/MainCases'
  import MainPrice from '~/components/main/MainPrice'
  import MainAbout from '~/components/main/MainAbout'
  import MainContacts from '~/components/main/MainContacts'


  export default {
    name: "TheMain",
    head () {
      return { title: this.$t('meta.title'),
        meta: [
          {
            hid: 'description',
            name: 'description',
            content: this.$t('meta.description')
          },
          {
            name: 'og:title',
            content: this.$t('meta.og-title')
          },
          {
            name: 'og:description',
            content: this.$t('meta.og-description')
          },
          {
            name: 'og:locale',
            content: this.$t('meta.og-locale')
          },
        ]}
    },
    components: {
      MainHeader,
      MainHero,
      MainServices,
      MainCases,
      MainPrice,
      MainAbout,
      MainContacts
    },
    data() {
      return {
        resize: true,
        fullPageReady: false,
        options: {
          licenseKey: 'XXXXXXXX-XXXXXXXX-XXXXXXXX-XXXXXXXX',
          verticalCentered: true,
          controlArrows: true,
          fixedElements: '#nav-menu',
          anchors: ['main', 'services', 'cases', 'price', 'about', 'contacts'],
          menu: '#mainMenu',
          responsiveHeight: 750,
          responsiveWidth: 750,
          afterRender: ()=> {
            this.fullPageReady = true
            setTimeout(()=>{
              this.fullPageReady = false
            }, 100)
          },
          sectionSelector: '.fullpage-section',
          normalScrollElements: '.fancybox-container, .wrapper-overflow, .paragraph, .form-response, .form-response *, .g-item-form__label',
        }
      }
    },
    methods: {
      prevSlide() {
        fullpage_api.moveSectionUp();
      },
      nextSlide() {
        fullpage_api.moveSectionDown();
      },
      getActiveSlideCustom(origin, destination) {
        this.$emit('updateOption', destination.anchor);
      },
    },
  }
</script>

<style scoped lang="less">
  @import "~@/assets/less/_variables";
  .navigation-wrapper {
    position: fixed;
    right: 100px;
    top: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: translateY(-50%);
    @media screen and (max-width: 1700px) {
      right: 50px;
    }
    .xl-block({
      display: none;
    });
    .arrow {
      position: relative;
      width: 26px;
      height: 26px;
      cursor: pointer;
      outline: none;
      &::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 26px;
        height: 26px;
        border-top: 1px solid #fff;
        border-right: 1px solid #fff;
      }
      &.prev-slide {
        transform: rotate(135deg);
      }
      &.next-slide {
        transform: rotate(-45deg);
      }
    }

    .main-nav-menu {
      display: flex;
      flex-direction: column;
      margin: 35px 0;
      .sm-max-height({
        margin: 15px 0;
      });
      li {
        margin-bottom: 10px;
        &:last-child {
          margin-bottom: 0;
        }
        &.active {
          .link-section {
            background-size: 35px 1px;
          }
        }
      }
      .link-section {
        display: inline-block;
        width: 40px;
        height: 25px;
        background: linear-gradient(to right, #fff, #fff) no-repeat center;
        background-size: 20px 1px;
        .sm-max-height({
          height: 18px;
        });
      }
    }
  }
</style>
