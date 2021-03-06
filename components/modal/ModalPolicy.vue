<template>
  <modal name='modal-policy' transition="pop-out" :height="'auto'" width="100%" :maxWidth="1170" :maxHeight="680"  :adaptive="true"
         :scrollable="true" @before-open="disableSrollFp" @before-close="activeSrollFp" :pivotY="0.8">
    <div class="modal b-modal-policy">
      <div class="close-modal" @click="$modal.hide('modal-policy')" title="Закрыть">
        <svg-close/>
      </div>
      <h2 class="title">Политика конфиденциальности</h2>
      <div class="wrapper-overflow" id="textPolicy" :class="classSection">
        <h3 class="title-section">1. Общие положения</h3>
        <p class="paragraph">Настоящая Политика конфиденциальности действует в отношении всей персональной информации, которую Компания Аппельсин может получить, собирает о Пользователе во время использования сайта, программ и других продуктов, принадлежащих компании. Их использование означает полное согласие пользователя с настоящей Политикой и указанными в ней условиями обработки его персональной информации.</p>
        <p class="paragraph">Настоящая политика конфиденциальности в отношении обработки персональных данных применяется ко всей информации, которую получает о пользователях своих продуктов Аппельсин.</p>
        <h3 class="title-section">2. Основные понятия</h3>
        <p class="paragraph">Автоматизированная обработка персональных данных – обработка персональных данных с помощью средств вычислительной техники.</p>
        <p class="paragraph">Блокирование персональных данных – временное прекращение обработки персональных данных (за исключением случаев, если обработка необходима для уточнения персональных данных).</p>
        <p class="paragraph">Информационная система персональных данных — совокупность содержащихся в базах данных персональных данных, и обеспечивающих их обработку информационных технологий и технических средств.</p>
        <p class="paragraph">Обезличивание персональных данных — действия, в результате которых невозможно определить без использования дополнительной информации принадлежность персональных данных конкретному Пользователю или иному субъекту персональных данных.</p>
        <p class="paragraph">Обработка персональных данных – любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.</p>
        <p class="paragraph">Персональные данные – любая информация, относящаяся прямо или косвенно к определенному или определяемому Пользователю продуктов, принадлежащих Компании Аппельсин.</p>
        <p class="paragraph">Предоставление персональных данных – действия, направленные на раскрытие персональных данных определенному лицу или определенному кругу лиц.</p>
        <p class="paragraph">Распространение персональных данных – любые действия, направленные на раскрытие персональных данных неопределенному кругу лиц (передача персональных данных) или на ознакомление с персональными данными неограниченного круга лиц, в том числе обнародование персональных данных в средствах массовой информации, размещение в сети инт или предоставление доступа к персональным данным каким-либо иным способом; Трансграничная передача персональных данных – передача персональных данных на территорию иностранного государства органу власти иностранного государства, иностранному физическому или иностранному юридическому лицу.</p>
        <p class="paragraph">Уничтожение персональных данных – любые действия, в результате которых персональные данные уничтожаются безвозвратно с невозможностью дальнейшего восстановления содержания персональных данных в информационной системе персональных данных и (или) результате которых уничтожаются материальные носители персональных данных.</p>
        <h3 class="title-section">3. Информация которую мы собираем</h3>
        <ul class="list">
          <li>Фамилия, имя, отчество;</li>
          <li>Номер телефона;</li>
          <li>Адрес электронной почты;</li>
          <li>А также обезличенные данных о пользователях (в т.ч. файлов «cookie») с помощью сервисов интернет-статистики и аналитики (Яндекс Метрика и Гугл Аналитика и других).</li>
        </ul>
        <p class="paragraph">Вышеперечисленные данные далее по тексту Политики объединены общим понятием Персональные данные.</p>
        <h3 class="title-section">4. Цели сбора данных</h3>
        <p class="paragraph">Цель обработки персональных данных Пользователя — информирование Пользователя посредством отправки электронных писем; предоставление доступа Пользователю к сервисам и продуктам Компании Аппельсин, информации и/или материалам, содержащимся на веб-сайте.</p>
        <p class="paragraph">Аппельсин имеет право направлять Пользователю уведомления о новых продуктах и услугах, специальных предложениях и различных событиях. Пользователь всегда может отказаться от получения информационных сообщений, направив письмо на адрес электронной почты info@appelsin.tech с пометкой «Отказ от уведомлениях о новых продуктах и услугах и специальных предложениях».</p>
        <p class="paragraph">Обезличенные данные Пользователей, собираемые с помощью сервисов статистики и аналитики, служат для сбора информации о взаимодействии Пользователей с продуктами Компании Аппельсин, улучшения их качества и содержания.</p>
        <h3 class="title-section">5. Правовые основания обработки персональных данных</h3>
        <p class="paragraph">Компания Аппельсин обрабатывает персональные данные Пользователя только в случае их заполнения и/или отправки Пользователем самостоятельно через специальные формы. Заполняя соответствующие формы и/или отправляя свои персональные данные в Аппельсин, Пользователь выражает свое согласие с данной Политикой.</p>
        <p class="paragraph">Дополнительно мы обрабатываем доступные обезличенные данные о Пользователе в случае, если Пользователь не запретил это.</p>
        <h3 class="title-section">6. Порядок сбора, хранения, передачи и других видов обработки персональных данных</h3>
        <p class="paragraph">Безопасность персональных данных, которые обрабатывает Аппельсин, обеспечивается путем реализации правовых, организационных и технических мер, необходимых для выполнения в полном объеме требований действующего законодательства в области защиты персональных данных. Аппельсин обеспечивает сохранность персональных данных и принимает все возможные меры, исключающие доступ к персональным данным неуполномоченных лиц.</p>
        <p class="paragraph">Персональные данные Пользователя никогда, ни при каких условиях не будут переданы третьим лицам, за исключением случаев, связанных с исполнением действующего законодательства.</p>
        <p class="paragraph">В случае выявления неточностей в персональных данных, Пользователь может актуализировать их самостоятельно, путем направления в Аппельсин уведомления на адрес электронной почты info@appelsin.tech с пометкой «Актуализация персональных данных».</p>
        <p class="paragraph">Срок обработки персональных данных является неограниченным. Пользователь может в любой момент отозвать свое согласие на обработку персональных данных, направив письмо на электронный адрес info@appelsin.tech с пометкой «Отзыв согласия на обработку персональных данных».</p>
        <h3 class="title-section">7. Трансграничная передача персональных данных</h3>
        <p class="paragraph">Аппельсин до начала осуществления трансграничной передачи персональных данных обязан убедиться в том, что иностранным государством, на территорию которого предполагается осуществлять передачу персональных данных, обеспечивается защита прав субъектов персональных данных.</p>
        <p class="paragraph">Трансграничная передача персональных данных на территории иностранных государств, не отвечающих вышеуказанным требованиям, может осуществляться только в случае наличия согласия в письменной форме субъекта персональных данных на трансграничную передачу его персональных данных и/или исполнения договора, стороной которого является субъект персональных данных.</p>
        <h3 class="title-section">8. Заключительные положения</h3>
        <p class="paragraph">Пользователь может получить любые разъяснения по интересующим вопросам, касающимся обработки его персональных данных, обратившись на электронную почту info@appelsin.tech. В данном документе будут отражены любые изменения политики обработки персональных данных. Политика действует бессрочно до замены ее новой версией.</p>
        <p class="paragraph">Актуальная версия Политики в свободном доступе расположена в сети Интернет по адресу
          <a class="link" href="https://appelsin.tech/#policy" target="_blank">https://appelsin.tech/#policy</a>
        </p>
        <p class="paragraph">
          Этот сайт защищен reCAPCHA при соблюдении
          <a class="link" href="https://policies.google.com/privacy" target="_blank">политики конфиденциальности</a> Google и
          <a class="link" href="https://policies.google.com/terms" target="_blank">пользовательского соглашения</a>.
        </p>
      </div>
    </div>
  </modal>
</template>

<script>
  import SvgClose from '~/assets/img/icon/delete.svg?inline'
  export default {
    name: "ModalPolicy",
    props: ['classSection'],
    components: {
      SvgClose
    },
    data() {
      return {
        page: 'home'
      }
    },
    methods:{
      disableSrollFp() {
        if(this.$route.path === '/') {
          fullpage_api.setAllowScrolling(false);
        }
      },
      activeSrollFp () {
        if(this.$route.path === '/') {
          fullpage_api.setAllowScrolling(true);
        }
      }
    },
    computed: {
      hashClass () {
        return window.location.hash
      },
    },
  }
</script>

<style scoped>

</style>
