<template>
  <div class="container">
    <div class="row pt-2 justify-content-center">
      <ul class="nav nav-pills" id="pncTabs" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="person-tab"
            data-toggle="tab"
            href="#person"
            role="tab"
            aria-controls="person"
            aria-selected="true"
            @click="tab = 'person'"
          >Person</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="vehicle-tab"
            data-toggle="tab"
            href="#vehicle"
            role="tab"
            aria-controls="vehicle"
            aria-selected="true"
            @click="tab = 'vehicle'"
          >Vehicle</a>
        </li>
      </ul>
    </div>
    <div class="row px-2">
      <div class="container mb-2">
        <div class="tab-content" id="pncTabs">
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'person'}"
            role="tabpanel"
            aria-labelledby="person-tab"
          >
            <div class="row justify-content-center">
              <div class="col" v-if="!personPnc">
                <div class="row mt-2 justify-content-center">
                  <form class="w-100" @submit="searchPerson">
                    <div class="form-group text-center">
                      <label for="personSearch">Search PNC</label>
                      <input
                        class="form-control"
                        type="text"
                        name="search"
                        id="personSearch"
                        placeholder="LAST NAME\FIRST NAME\DDMMYYYY"
                        required
                      />
                      <p id="personValidation"></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'vehicle'}"
            role="tabpanel"
            aria-labelledby="vehicle-tab"
          >Vehicle</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tab: "person",
      personPnc: false,
      vehiclePnc: false
    };
  },
  methods: {
    searchPerson: function(e) {
      document.getElementById('personValidation').innerHTML = '';
      e.preventDefault();
      if(!e.target.elements.personSearch.value.match(/\b[a-zA-Z ]*\\[a-zA-Z ]*\\[0-3][0-9][0-1][0-9][0-9]{4}\b/g)) {
        document.getElementById('personValidation').innerHTML = 'Your search does not match the required format'
      }
    }
  }
};
</script>

<style>
</style>