<template>
  <footer class="b-footer" :class="{active : showMenu}">
    <div class="container">
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <a class="policy" href="#" @click.prevent="$modal.show('modal-policy')">{{$t('privacy-policy.title')}}</a>
    </div>
  </footer>
</template>

<script>
  export default {
    name: 'footer-block',
    data() {
      return {
        showMenu: false
      }
    },
    mounted() {
      this.$bus.$on('main-menu', () => {
        this.showMenu = !this.showMenu
      })
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";

  .b-footer {
    position: fixed;
    padding-bottom: 30px;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 997;
    transition: all 0.3s ease-out;
    transition-delay: 0.7s;
    .sm-block({ display: none; padding-bottom: 50px; opacity: 0; transform: translateX(50px);});
    .xs-block({ display: none;  opacity: 0; transform: translateX(50px);});
    .sm-max-height({ display: none;  opacity: 0; transform: translateX(50px);});
    &.active {
      display: block;
      opacity: 1;
      .md-max-height({ transform: translateX(0);});
      .sm-block({    transform: translateX(0);});
      .container {
        .sm-block({flex-direction: column;
          align-items: center;});
        .policy {
          display: block;
          color: #000;
          transition: color, border-bottom-color 0.3s ease-out;
          transition-delay: 0.2s;
          border-bottom: 1px solid #000;
          margin-right: 350px;
          .sm-block({ order: 3;
            margin-right: 0;});
        }
        .phone {
          color: #000;
          transition: color 0.3s ease-out;
          transition-delay: 0.2s;
          .sm-block({ order: 2; display: block;
            margin-bottom: 20px; color: #000; });
          .xs-max-height({ display: block;});
        }
      }
    }
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      .sm-block({ justify-content: center;});
      .phone {
        display: block;
        font-size: 1.7rem;
        color: #fff;
      }
      .submit {
        display: none;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.47rem;
        letter-spacing: 0.7rem;
        color: #fff;
        .bottom-hover();
      }
      .policy {
        display: inline-block;
        font-size: 1.7rem;
        font-weight: 300;
        color: #fff;
        transition: 0.3s;
        border-bottom: 1px solid #fff;
        margin-right: 150px;
        @media (max-width: 1650px) {
          margin-right: 350px;
        }
        .sm-block({ display: none;});
        &:hover {
          border-bottom-color: transparent;
        }
      }
    }
  }
</style>
