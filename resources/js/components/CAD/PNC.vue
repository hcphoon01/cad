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
            <div class="row mt-2 justify-content-center">
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
              <div class="col" v-else>
                <form class="w-100">
                  <div class="row">
                    <div class="col-4 form-group text-center">
                      <label for="first_name">First Name</label>
                      <input
                        class="form-control"
                        type="text"
                        name="first_name"
                        id="first_name"
                        disabled
                        :value="personPnc.first_name"
                      />
                    </div>
                    <div class="col-4 form-group text-center">
                      <label for="last_name">Last Name</label>
                      <input
                        class="form-control"
                        type="text"
                        name="last_name"
                        id="last_name"
                        disabled
                        :value="personPnc.last_name"
                      />
                    </div>
                    <div class="col-4 form-group text-center">
                      <label for="dob">Date of Birth</label>
                      <input
                        class="form-control"
                        type="text"
                        name="dob"
                        id="dob"
                        disabled
                        :value="personPnc.dob"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group text-center">
                      <label for="address">Address</label>
                      <input
                        class="form-control"
                        type="text"
                        name="address"
                        id="address"
                        disabled
                        :value="personPnc.address"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group text-center">
                      <label for="aliases">Aliases</label>
                      <textarea
                        class="form-control"
                        type="text"
                        name="aliases"
                        id="aliases"
                        disabled
                        :value="personPnc.aliases ? showAliases() : ''"
                        rows="3"
                      ></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group text-center">
                      <label for="markers">Markers</label>
                      <textarea
                        class="form-control"
                        type="text"
                        name="markers"
                        id="markers"
                        disabled
                        :value="personPnc.markers ? showMarkers() : ''"
                        rows="5"
                      ></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      <button type="button" class="btn btn-primary" @click="personPnc = false">Back</button>
                    </div>
                  </div>
                </form>
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
      document.getElementById("personValidation").innerHTML = "";
      e.preventDefault();
      if (
        !e.target.elements.personSearch.value.match(
          /\b[a-zA-Z ]*\\[a-zA-Z ]*\\[0-3][0-9][0-1][0-9][0-9]{4}\b/g
        )
      ) {
        document.getElementById("personValidation").innerHTML =
          "Your search does not match the required format";
        return;
      }
      this.$api
        .post("/api/pnc/person", {
          search: e.target.elements.personSearch.value
        })
        .then(res => {
          if (res.data.length != 0) {
            this.personPnc = res.data;
          }
        })
        .catch(err => {
          console.log(err.response.data);
        });
    },
    showAliases: function() {
      let aliasString = "";
      this.personPnc.aliases.forEach(
        (item, i) => (aliasString += i + 1 + ". " + item + "\n")
      );
      aliasString = aliasString.substring(0, aliasString.length - 1);
      return aliasString;
    },
    showMarkers: function() {
      let markerString = "";
      this.personPnc.markers.forEach(
        (item, i) =>
          (markerString +=
            i + 1 + ". " + item.name + " - " + item.abbreviation + "\n")
      );
      markerString = markerString.substring(0, markerString.length - 1);
      return markerString;
    }
  }
};
</script>

<style>
</style>