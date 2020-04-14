<template>
  <div>
    <main-header />
    <main-social/>
    <main>
      <nuxt />
    </main>
    <main-footer/>

    <modal-policy/>
    <modal-brief/>
  </div>
</template>

<script>
  import MainHeader from '~/components/main/MainHeader'
  import MainFooter from '~/components/main/MainFooter'
  import MainSocial from '~/components/main/MainSocial'
  import ModalPolicy from '~/components/modal/ModalPolicy'
  import ModalBrief from '~/components/modal/ModalBrief'
  export default {
    name: "error",
    components: {
      MainHeader,
      MainFooter,
      MainSocial,
      ModalPolicy,
      ModalBrief
    }
  }
</script>
<style>

</style>
