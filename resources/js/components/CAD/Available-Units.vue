<template>
  <div class="card">
    <div class="card-header bg-danger text-white">
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
      <li class="list-group-item" v-for="(unit, i) in sortByState(units)" :key="i">
        <div class="card shadow" :class="stateBgColour(unit.state)" :id="unit.id">
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
                  class="badge badge-pill mx-1"
                  v-for="(state, i) in displayStateList(unit)"
                  :key="i"
                  v-on:click="stateSelect(state.id, unit)"
                  :class="stateBgColour(state.id)"
                  style="cursor: pointer"
                >{{state.name}}</span>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
let blinkInterval;
var audio = new Audio('/audio/panic.wav');
audio.volume = 0.1;
export default {
  props: ['units', 'states', 'activeCad', 'cads'],
  methods: {
    getQualsFromUsers: function(users) {
      if (users) {
        const qualList = [];
        users.forEach(user => {
          user.user.qualifications.forEach(qual => {
            if (qualList.filter(e => e.id === qual.id).length == 0) {
              qualList.push(qual);
            }
          });
        });
        return qualList;
      }
    },
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
        case 7: 
          return "Other Assignment";
        case 8:
          return "Stop";
        case 9:
          return "Prisioner Transport";
      }
    },
    stateBgColour: function(state) {
      switch (parseInt(state, 10)) {
        case 0:
          return "bg-danger text-white";
        case 2:
          return "bg-success text-white";
        case 4:
          return "bg-muted text-white";
        case 5:
          return "bg-warning text-dark";
        case 6:
          return "bg-primary text-white";
        case 7:
          return "bg-secondary text-white";
        case 8:
          return "bg-muted text-white";
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
          return state.id != unitState;
        });
        return stateList;
      }
    },
    stateSelect: function(state, unit) {
      switch (state) {
        case 0:
          unit.state = 0;
          this.updateState(unit);
          let blinkRed = true;
          blinkInterval = setInterval(() => {
            audio.loop = true;
            audio.play();
            if (blinkRed) {
              document.getElementById(unit.id).classList.add("bg-danger");
              document.getElementById(unit.id).classList.add("text-white");
              blinkRed = false;
            } else {
              document.getElementById(unit.id).classList.remove("bg-danger");
              document.getElementById(unit.id).classList.remove("text-white");
              blinkRed = true;
            }
          }, 500);
          break;
        case 2:
          clearInterval(blinkInterval);
          audio.pause();
          unit.state = 2;
          if (unit.assigned_cad) {
            this.dissociateUnit(unit, unit.assigned_cad);
            unit.assigned_cad = "";
          }
          this.updateState(unit);
          break;
        case 4:
          unit.state = 4;
          if (unit.assigned_cad) {
            this.dissociateUnit(unit, unit.assigned_cad);
            unit.assigned_cad = "";
          }
          this.updateState(unit);
          break;
        case 5:
          unit.state = 5;
          this.updateState(unit);
          break;
        case 6:
          unit.state = 6;
          this.updateState(unit);
          break;
        case 7:
          unit.state = 7;
          this.updateState(unit);
          break;
        case 8:
          unit.state = 8;
          this.updateState(unit);
          break;
        case 9:
          unit.state = 9;
          this.updateState(unit);
          break;
      }
    },
    displayName: function(name) {
      const initial = name.substr(0, 1);
      const lastName = name.split(" ")[1];
      return `${initial}.${lastName}`;
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
    },
    dissociateUnit: function(unit, cadId) {
      if (cadId == this.activeCad.id) {
        const unitArr = this.activeCad.units.filter(obj => {
          return obj.id !== unit.id;
        });
        this.activeCad.units = unitArr;
      } else {
        this.cads.find(cad => {
          if (cad.id == cadId) {
            const unitArr = cad.units.filter(obj => {
              return obj.id !== unit.id;
            });
            cad.units = unitArr;
          }
        });
      }
    },
    updateState: function(unit) {
      this.$api
        .post(`/api/cad/state`, {
          unit: unit
        })
        .catch(err => {
          console.log(err);
        });
    },
  }

}
</script>

<style>

</style>