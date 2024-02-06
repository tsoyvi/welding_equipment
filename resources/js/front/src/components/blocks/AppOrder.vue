<template>
<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading-organization">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-organization" aria-expanded="true">
                Организация {{RECORD_SELECTED.applicant}} - {{RECORD_SELECTED.name_organization}}
            </button>
        </h2>
        <div id="panelsStayOpen-organization" class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-organization">
            <div class="accordion-body">
                <FormOrganization />
            </div>
        </div>
    </div>
    <div class="accordion-item"
      v-if="RECORD_SELECTED.id"
    >
        <h2 class="accordion-header" id="panelsStayOpen-heading-equipment">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Сварочное оборудование
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-equipment">
            <div class="accordion-body">
                <FormOrder>
                </FormOrder>
            </div>
        </div>
    </div>

</div>

    <hr>

</template>

<script>
import { mapGetters } from 'vuex'

import FormOrganization from './FormOrganization.vue'
import FormOrder from './FormOrder.vue'

export default {
  name: 'AppOrder',

  components: {
    FormOrganization,
    FormOrder
  },

  data () {
    return {

    }
  },

  computed: {
    ...mapGetters(['RECORD_SELECTED'])
  },

  methods: {

  }

}
</script>

<style>

</style>
