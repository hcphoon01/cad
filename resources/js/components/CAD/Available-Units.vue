<template>
  <div class="card">
    <div class="card-header bg-primary text-white">
      Available Units
      <a
        role="button"
        data-toggle="collapse"
        data-target="#unitList"
        aria-expanded="true"
        aria-controls="unitList"
        class="float-right"
      >
        <font-awesome-icon icon="window-minimize" />
      </a>
    </div>
    <ul class="list-group list-group-flush collapse show" id="unitList">
      <li class="list-group-item" v-for="(unit, i) in sortByState(this.units)" :key="i">
        <div class="card shadow" :class="stateBgColour(unit.state)">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h3>{{unit.callsign.callsign}}</h3>
                <p>{{stateName(unit.state)}}</p>
                <div v-for="(user, i) in unit.users" :key="i">
                  <font-awesome-icon icon="user" />
                  &nbsp;{{displayName(user.user.name)}}
                </div>
                <div>
                  <font-awesome-icon icon="car" />
                  &nbsp;{{unit.vehicle.vrm}} ({{unit.vehicle.model_abbreviation}})
                </div>
              </div>
              <div class="col">
                <span
                  class="badge badge-pill text-wrap"
                  v-for="(qual, i) in getQualsFromUsers(unit.users)"
                  :key="i"
                  :class="qualBgColour(qual)"
                >{{qual.name}}</span>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col">
                <span
                  class="badge badge-pill"
                  v-for="(state, i) in displayStateList(unit)"
                  :key="i"
                  v-on:click="stateSelect(state)"
                  :class="stateBgColour(state)"
                >State {{state}}</span>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      units: [],
    }
  },
  methods: {
    sortByState: function(arr) {
      if (arr) {
        return arr.slice().sort(function(a, b) {
          return a.state - b.state;
        });
      }
    },
    stateName: function(state) {
      switch (state) {
        case 0:
          return "Emergency Assistance";
        case 2:
          return "On Patrol";
        case 4:
          return "Refreshments";
        case 5:
          return "En Route";
        case 6:
          return "At Scene";
        case 9:
          return "Prisioner Escort";
      }
    },
    stateTextColour: function(state) {
      switch (state) {
        case 0:
          return "text-danger";
        case 2:
          return "text-success";
        case 4:
          return "text-primary";
        case 5:
          return "text-warning";
        case 6:
          return "text-secondary";
        case 9:
          return "text-secondary";
      }
    },
    stateBgColour: function(state) {
      switch (parseInt(state, 10)) {
        case 0:
          return "bg-danger text-white";
        case 2:
          return "bg-success text-white";
        case 4:
          return "bg-primary text-white";
        case 5:
          return "bg-warning text-dark";
        case 6:
          return "bg-secondary text-white";
        case 9:
          return "bg-secondary text-white";
        case 11:
          return "bg-dark text-white";
      }
    },
    displayStateList: function(unit) {
      if (unit) {
        let stateList = this.states;
        let unitState = parseInt(unit.state, 10);
        stateList = stateList.filter(function(state) {
          return state !== unitState;
        });
        return stateList;
      }
    },
    stateSelect: function(state) {
      console.log(state);
    },
    qualBgColour: function(qual) {
      switch (qual.type) {
        case "Driver":
          return "badge-primary";
        case "Firearms":
          return "badge-danger";
        case "Other":
          return "badge-success text-dark";
        case "Public Order":
          return "badge-info";
      }
    }
  }
};
</script>

<style>
</style>