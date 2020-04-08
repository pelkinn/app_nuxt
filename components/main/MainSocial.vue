<template>
  <ul class="b-social">
    <li class="item">
      <a class="item-link" href="https://vk.com/appelsin_tech" target="_blank">
        <svg-social-vk/>
        <svg-social-vk-hover/>
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.instagram.com/appelsin_tech/" target="_blank">
        <svg-social-instagram/>
        <svg-social-instagram-hover/>
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.facebook.com/Appelsintech/" target="_blank">
        <svg-social-fb/>
        <svg-social-fb-hover/>
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.youtube.com/channel/UCt8CyzxKiuecJk_i2f3_rSA" target="_blank">
        <svg-social-yt/>
        <svg-social-yt-hover/>
      </a>
    </li>
  </ul>
</template>

<script>
  import SvgSocialVk from '~/assets/img/icon/social/vk.svg?inline'
  import SvgSocialVkHover from '~/assets/img/icon/social/vk-hover.svg?inline'
  import SvgSocialInstagram from '~/assets/img/icon/social/instagram.svg?inline'
  import SvgSocialInstagramHover from '~/assets/img/icon/social/instagram-hover.svg?inline'
  import SvgSocialFb from '~/assets/img/icon/social/fb.svg?inline'
  import SvgSocialFbHover from '~/assets/img/icon/social/fb-hover.svg?inline'
  import SvgSocialYt from '~/assets/img/icon/social/yt.svg?inline'
  import SvgSocialYtHover from '~/assets/img/icon/social/yt-hover.svg?inline'
  export default {
    name: 'social-block',
    components: {
      SvgSocialVk,
      SvgSocialVkHover,
      SvgSocialInstagram,
      SvgSocialInstagramHover,
      SvgSocialFb,
      SvgSocialFbHover,
      SvgSocialYt,
      SvgSocialYtHover
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .b-social {
    position: fixed;
    display: flex;
    left: 0;
    top: 50%;
    flex-direction: column;
    transform: translateY(-50%);
    z-index: 99;
    .xl-block({ display: none;});
    .item {
      &-link {
        display: flex;
        position: relative;
        width: 72px;
        height: 72px;
        transition: 0.3s;
        &:hover {
          svg {
            &.hover-none {
              opacity: 0;
            }
            &.hover {
              opacity: 1;
            }
          }
        }
        >svg {
          width: 100%;
          height: 100%;
          transition: 0.3s;
          &.hover {
            position: absolute;
            opacity: 0;
          }
          path {
            fill: #fff;
            transition: 0.3s;
          }
        }
      }
    }
  }
</style>
