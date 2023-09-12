<template>
gergre
  <div id = "divOTUSelector" class="div-OTU">
    <table class="">
        <tr>
          <td>
            <div v-for="(otuItem, otuIndex) in otuItems" :key="otuIndex">
              <label for="surNane"></label>
                <input type="checkbox" :value="otuItem.name"
                 @change="otuToString()" v-model="enableOtu[otuIndex]">
              {{ otuItem.name + ' - ' + otuItem.header }}
              <transition name="listotu-fade">
                <div class="table-style" v-if="enableOtu[otuIndex]">

                  <label class="label-OTU" :for="otuItem.name + index" v-for="(item, index) in otuItem.items"
                    :key="index">
                    <input type="checkbox" :value="index" :id="otuItem.name + index"
                    v-model="selectedOtu[otuIndex]" @change="otuToString()"
                      :title="item.description">
                      {{ otuItem.name }}({{ index }})
                  </label>

                </div>
              </transition>
            </div>
          </td>
        </tr>
        <tr>
          <td style="background:#F5F6CE">
            <label for="select-OTU">
             <input type="checkbox" id="STO_GAZ" onClick="select_OTU();">
            С учетом ПАО "Газпром"
            </label>
          </td>
        </tr>
      </table>

    <div class="OTU-button-close" @click="close()" @keydown="bar">
      <i class="fa fa-window-close" aria-hidden="true"></i>
    </div>

    <!--  <div>Строка: {{otuToString(selectedOtu)}}</div>
      <button @click="stringToSelectedOtu('НГДО(1,2,3,4,12) ')">
        test string</button>

      <div class="div-OTU-shadow" @click="$parent.$parent.selectOtu = false"></div>
    -->
    <div class="div-OTU-shadow"  @click="close()" @keydown="bar"></div>
  </div>
  otuString - {{otuString}} , enableOtu - {{ enableOtu}}
</template>

<script>

import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'SelectOtu',
  data () {
    return {
      enableOtu: {},
      selectedOtu: {
        0: [],
        1: [],
        2: [],
        3: [],
        4: [],
        5: [],
        6: [],
        7: [],
        8: [],
        9: [],
        10: [],
        11: [],
        StoGazprom: []
      },
      otuString: ''
    }
  },

  components: {
  },

  computed: {
    ...mapGetters(['otuItems'])
  },

  methods: {
    ...mapActions(['']),

    otuToString () {
      let str = ''
      this.otuString = ''
      Object.entries(this.selectedOtu).forEach((otu) => {
        str = otu[1].sort((a, b) => a - b).join(',')
        if (str && this.enableOtu[otu[0]] === true) {
          if (this.otuString !== '') { this.otuString += ', ' }
          this.otuString += `${this.otuItems[otu[0]].name}(${str})`
        }
      })
      console.log(this.otuString)
    },

    close () {
      this.selectOtuUnShow()
    }
  }

}

</script>
