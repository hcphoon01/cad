<template>
  <div v-if="this.isLoading">
    <circle-spin :loading="isLoading"></circle-spin>
  </div>
  <div class="container-fluid py-4 h-100" v-else>
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" @click="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card h-100">
      <div class="card-header">City of London RP CAD</div>
      <div class="row py-4 px-4 h-100">
        <div class="col-md-3 h-100">
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
        </div>
        <div class="col">
          <div class="row justify-content-between">
            <div class="d-flex">
              <div class="pr-2">
                <a class="btn btn-primary" href="#" data-target="#createModal" data-toggle="modal" role="button">Create CAD</a>
              </div>
              <div class="px-2">
                <button
                  type="button"
                  class="btn btn-primary"
                  v-on:click="triggerTimer"
                >Start/Stop Pursuit Timer</button>
              </div>
              <div class="vw-10 px-2">
                <input
                  type="text"
                  class="form-control"
                  name="timer"
                  id="timer"
                  :placeholder="time"
                  readonly
                />
              </div>
            </div>
            <div class="px-2">
              <a class="btn btn-danger" role="button" href="#">Book Off</a>
            </div>
            <div class="px-2">
              <span class="badge badge-pill badge-primary text-wrap" style="width: 9rem;">
                {{dateNow}}
                {{this.displayName(this.position.user.name)}} {{this.position.callsign.callsign}}
              </span>
            </div>
          </div>
          <div class="row py-4">
            <div class="col">
              <div class="card">
                <div class="card-header bg-primary text-white">
                  Active CAD
                  <a
                    role="button"
                    data-toggle="collapse"
                    data-target="#activeCAD"
                    aria-expanded="true"
                    aria-controls="activeCAD"
                    class="float-right"
                  >
                    <font-awesome-icon icon="window-minimize" />
                  </a>
                </div>
                <div class="card-group collapse show" id="activeCAD">
                  <div class="card">
                    <div class="card-header">
                      <div class="row justify-content-between">
                        <div class="d-flex px-2">
                          <h5>CAD: {{this.activeCad.display_name}}</h5>
                        </div>
                        <div class="float-right">
                          <p
                            class="pull-right"
                          >Last Updated: {{this.formatDate(this.activeCad.updated_at, 'DD/MM/YYYY HH:mm')}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6 border">
                          <div class="row pt-4 no-gutters">
                            <div class="col border">
                              <p class="pl-2">Location: {{this.activeCad.location}}</p>
                            </div>
                            <div
                              class="col border"
                              v-bind:class="{'bg-danger text-white': this.activeCad.response_level == 'Immediate', 'bg-warning': this.activeCad.response_level == 'Standard'}"
                            >
                              <p class="pl-2">Response Level: {{this.activeCad.response_level}}</p>
                            </div>
                            <div class="w-100"></div>
                            <div class="col border">
                              <p class="pl-2">INC Channel: {{this.activeCad.inc_channel}}</p>
                            </div>
                            <div class="col border">
                              <p class="pl-2">Caller Name: {{this.activeCad.caller_name}}</p>
                            </div>
                          </div>
                          <div class="row py-4">
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Call Description</h5>
                                  <div class="card-text">{{this.activeCad.description}}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row no-gutters">
                            <div class="col border">
                              <p class="pl-2">Assign Units</p>
                            </div>
                            <div class="col border">
                              <div>
                                <autocomplete
                                  ref="searchUnit"
                                  :search="unitSearch"
                                  :get-result-value="getUnitCallsign"
                                  auto-select
                                  @submit="assignUnit"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row no-gutters">
                            <div class="col border">
                              <h6 class="pl-2">
                                Assigned:
                                <span
                                  v-bind:class="stateTextColour(unit.state)"
                                  v-for="(unit, index) in this.activeCad.units"
                                  :key="index"
                                  v-on:click="detachUnit(unit)"
                                  style="cursor: pointer"
                                >{{unit.callsign.callsign}}&nbsp;</span>
                              </h6>
                            </div>
                          </div>
                          <div class="row no-gutters pb-4">
                            <div class="col border py-1 px-1">
                              <a role="button" href="#" class="btn btn-primary">
                                Close CAD
                                <font-awesome-icon icon="times" />
                              </a>
                              <a role="button" href="#" class="btn btn-primary">
                                Edit CAD
                                <font-awesome-icon icon="edit" />
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="card-header">
                              CAD Remarks
                              <a
                                role="button"
                                data-toggle="collapse"
                                data-target="#remarks"
                                aria-expanded="true"
                                aria-controls="remarks"
                                class="float-right"
                              >
                                <font-awesome-icon icon="window-minimize" />
                              </a>
                            </div>
                            <table class="table table-sm collapse show" id="remarks">
                              <thead>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                              </thead>
                              <tbody v-for="(remark, i) in this.activeCad.remarks" :key="i">
                                <tr class="border">
                                  <td>{{formatDate(remark.created_at, 'HH:mm:ss')}}</td>
                                  <td>{{remark.unit.callsign.callsign}}</td>
                                  <td>{{remark.remark}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="form-group px-3">
                              <input
                                class="form-control form-inline"
                                type="text"
                                name="remark"
                                id="remark"
                                placeholder="Type to add a remark"
                                v-on:keyup.enter="addRemark($event, activeCad.id)"
                                v-model="remark"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row py-2">
            <div class="col">
              <div class="card">
                <div class="card-header bg-primary text-white">
                  Outstanding CADs
                  <a
                    role="button"
                    data-toggle="collapse"
                    data-target="#outstandingCAD"
                    aria-expanded="true"
                    aria-controls="outstandingCAD"
                    class="float-right"
                  >
                    <font-awesome-icon icon="window-minimize" />
                  </a>
                </div>
                <div class="card-body collapse show" id="outstandingCAD">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>CAD Number</th>
                        <th>Grade</th>
                        <th>INC Channel</th>
                        <th>Call Description</th>
                        <th>Location</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-on:click="clickList(cad, i)"
                        v-for="(cad,i) in this.cads"
                        :key="i"
                        style="cursor: pointer"
                      >
                        <td>{{cad.display_name}}</td>
                        <td
                          v-bind:class="{'bg-danger text-white': cad.response_level == 'Immediate', 'bg-warning': cad.response_level == 'Standard'}"
                        >{{cad.response_level}}</td>
                        <td>{{cad.inc_channel}}</td>
                        <td>{{cad.description}}</td>
                        <td>{{cad.location}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Autocomplete from "@trevoreyre/autocomplete-vue";
import "@trevoreyre/autocomplete-vue/dist/style.css";

let blinkInterval;

export default {
  components: {
    Autocomplete,
  },
  data: function() {
    return {
      time: "00:00:00:000",
      units: [],
      cads: [],
      activeCad: [],
      position: [],
      isLoading: true,
      dateNow: "",
      states: [
        {
          id: 0,
          name: "Emergency Assisstance"
        },
        {
          id: 2,
          name: "On Patrol"
        },
        {
          id: 4,
          name: "Refreshments"
        },
        {
          id: 5,
          name: "En Route"
        },
        {
          id: 6,
          name: "At Scene"
        },
        {
          id: 9,
          name: "Prisoner Transport"
        },
        {
          id: 11,
          name: "Off Duty"
        }
      ],
      remark: "",
    };
  },
  created: function() {
    this.fetchData();
    //this.getActiveCad();
  },
  mounted: function() {
    this.timeBegan = null;
    this.timeStopped = null;
    this.stoppedDuration = 0;
    this.started = null;
    this.running = false;
    this.currentTime();
    this.listen();
  },
  destroyed: function() {
    this.reset();
  },
  methods: {
    listen: function() {},
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
        case 9:
          return "Prisioner Transport";
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
          return state.id != unitState;
        });
        return stateList;
      }
    },
    stateSelect: function(state, unit) {
      switch (state) {
        case 0:
          unit.state = 0;
          let blinkRed = true;
          blinkInterval = setInterval(() => {
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
        case 9:
          unit.state = 9;
          this.updateState(unit);
          break;
      }
    },
    updateState: function(unit) {
      this.$api
        .post(`/api/cad/state`, {
          unit: unit
        })
        .then(response => {
          console.log(response);
        })
        .catch(err => {
          console.log(err);
        });
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
    formatDate: function(date, format) {
      if (date) {
        return this.$moment(String(date)).format(format);
      }
    },
    remarkAdd: function(id, remark) {
      this.$api
        .post(`/api/cad/remark`, {
          id: id,
          remark: remark,
          unit: this.position.id,
          type: "controller"
        })
        .catch(err => {
          console.log(err);
        });
    },
    fetchData: function() {
      this.cads = this.units = null;
      this.$api
        .get("/api/cad/index")
        .then(response => {
          this.cads = response.data.cads;
          this.activeCad = this.cads[0];
          this.cads.shift();
          this.units = response.data.units;
          this.position = response.data.controller;
          this.isLoading = false;
        })
        .catch(error => {
          this.cads = [];
          this.units = [];
          this.fetched = false;
        });
    },
    displayName: function(name) {
      const initial = name.substr(0, 1);
      const lastName = name.split(" ")[1];
      return `${initial}.${lastName}`;
    },
    triggerTimer: function() {
      if (this.running) return this.stop();
      if (this.timeStopped) return this.reset();
      return this.start();
    },
    start: function() {
      if (this.running) return;

      if (this.timeBegan === null) {
        this.reset();
        this.timeBegan = new Date();
      }
      if (this.timeStopped !== null) {
        this.stoppedDuration += new Date() - this.timeStopped;
      }

      this.started = setInterval(this.clockRunning, 10);
      this.running = true;
    },
    stop: function() {
      this.running = false;
      this.timeStopped = new Date();
      clearInterval(this.started);
    },
    reset: function() {
      this.running = false;
      clearInterval(this.started);
      this.stoppedDuration = 0;
      this.timeBegan = null;
      this.timeStopped = null;
      this.time = "00:00:00.000";
    },
    clockRunning: function() {
      var currentTime = new Date(),
        timeElapsed = new Date(
          currentTime - this.timeBegan - this.stoppedDuration
        ),
        hour = timeElapsed.getUTCHours(),
        min = timeElapsed.getUTCMinutes(),
        sec = timeElapsed.getUTCSeconds(),
        ms = timeElapsed.getUTCMilliseconds();

      this.time =
        this.zeroPrefix(hour, 2) +
        ":" +
        this.zeroPrefix(min, 2) +
        ":" +
        this.zeroPrefix(sec, 2) +
        "." +
        this.zeroPrefix(ms, 3);
    },
    currentTime: function() {
      this.dateNow = this.$moment().format("DD/MM/YYYY HH:mm");

      setTimeout(this.currentTime, 1000);
    },
    zeroPrefix: function(num, digit) {
      var zero = "";
      for (var i = 0; i < digit; i++) {
        zero += "0";
      }
      return (zero + num).slice(-digit);
    },
    clickList: function(cad, index) {
      this.cads.splice(index, 1);
      this.cads.push(this.activeCad);
      this.activeCad = cad;
    },
    clickUnit: function() {
      console.log("Clicked a unit");
    },
    addRemark: function(event, id) {
      if (event.target.value.length > 0) {
        const remark = {
          created_at: this.$moment().format(),
          unit: {
            callsign: {
              callsign: this.position.callsign.callsign
            }
          },
          remark: event.target.value
        };
        this.remark = "";
        this.activeCad.remarks.push(remark);
        this.remarkAdd(id, event.target.value);
      }
    },
    assignUnit: function(selectedUnit) {
      if (!selectedUnit || selectedUnit.assigned_cad == this.activeCad.id)
        return;
      this.$refs.searchUnit.value = "";
      this.activeCad.units.push(selectedUnit);
      this.cads.find(cad => {
        if (cad.id == selectedUnit.assigned_cad) {
          const unitArr = cad.units.filter(obj => {
            return obj.id !== selectedUnit.id;
          });
          cad.units = unitArr;
        }
      });
      var assignedUnit = this.units.find(unit => {
        if (unit.id == selectedUnit.id) {
          unit.state = 5;
          unit.assigned_cad = this.activeCad.id;
          return unit;
        }
      });
      this.$api
        .post(`/api/cad/assign`, {
          unit: assignedUnit,
          cad: this.activeCad
        })
        .catch(err => {
          console.log(err);
        });
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
    detachUnit: function(unit) {
      this.units.find(obj => {
        if (obj.id == unit.id) {
          obj.state = 2;
        }
      });
      this.stateSelect(2, unit);
    },
    unitAssigned: function(unit, cad) {
      if (unit.assigned_cad == cad.id) {
        return true;
      } else {
        return false;
      }
    },
    unitSearch: function(input) {
      if (input.length < 1) {
        return [];
      }
      return this.units.filter(unit => {
        if (!this.unitAssigned(unit, this.activeCad)) {
          return unit.callsign.callsign
            .toLowerCase()
            .startsWith(input.toLowerCase());
        }
      });
    },
    getUnitCallsign: function(unit) {
      return unit.callsign.callsign;
    }
  }
};
</script>

<style scoped>
.scroll {
  max-height: 100px;
  overflow-y: auto;
}
</style>