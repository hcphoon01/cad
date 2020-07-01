<template>
  <div v-if="this.isLoading">
    <circle-spin :loading="isLoading"></circle-spin>
  </div>
  <div class="container-fluid py-4 h-100" v-else>
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <form @submit="createCad" id="createCadForm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create CAD</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="response">Response Category</label>
                <select name="response" id="response" class="form-control" required>
                  <option value="Immediate">Immediate</option>
                  <option value="Standard">Standard</option>
                </select>
              </div>
              <div class="form-group">
                <label for="caller_name">Caller Name</label>
                <input type="text" name="caller_name" id="caller_name" class="form-control" required>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" required>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="vrm">VRM</label>
                    <input type="text" name="vrm" id="vrm" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="description">Call Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Create</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="editModal" v-if="this.activeCad">
      <div class="modal-dialog" role="document">
        <form @submit="editCad" id="editCadForm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit CAD: {{this.activeCad.display_name}}</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="response">Response Category</label>
                <select name="response" id="response-2" class="form-control" required>
                  <option value="Immediate" :selected="this.activeCad.response_level == 'Immediate'">Immediate</option>
                  <option value="Standard" :selected="this.activeCad.response_level == 'Standard'">Standard</option>
                </select>
              </div>
              <div class="form-group">
                <label for="caller_name">Caller Name</label>
                <input type="text" name="caller_name" id="caller_name-2" class="form-control" required :value=this.activeCad.caller_name>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location-2" class="form-control" required :value=this.activeCad.location>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="vrm">VRM</label>
                    <input type="text" name="vrm" id="vrm2" class="form-control" :value=this.activeCad.vrm>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="description">Call Description</label>
                <textarea name="description" id="description-2" rows="3" class="form-control" required v-model="this.activeCad.description"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card h-100">
      <div class="card-header">City of London RP CAD</div>
      <div class="row py-4 px-4 h-100">
        <div class="col-md-3 h-100">
          <AvailableUnits 
          :units="this.units" 
          :states="this.states" 
          :activeCad="this.activeCad"
          :cads="this.cads"
          ref="availableUnits"/>
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
                  class="btn btn-success"
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
              <button class="btn btn-primary" @click="pncPopup">PNC</button>
            </div>
            <div class="px-2">
              <a class="btn btn-danger" role="button" href="#">Book Off</a>
            </div>
            <div class="px-2">
              <span class="badge badge-pill badge-danger text-wrap" style="width: 9rem;">
                {{dateNow}}
                {{this.displayName(this.position.user.name)}} {{this.position.callsign.callsign}}
              </span>
            </div>
          </div>
          <div class="row py-4">
            <div class="col">
              <div class="card">
                <div class="card-header bg-danger text-white">
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
                <div class="card-group collapse show" id="activeCAD" v-if="this.activeCad">
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
                              <p class="pl-2">VRM: {{this.activeCad.vrm}}</p>
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
                              <a role="button" href="#" class="btn btn-danger" @click="closeCad">
                                Close CAD
                                <font-awesome-icon icon="times" />
                              </a>
                              <a role="button" href="#" class="btn btn-warning" data-target="#editModal" data-toggle="modal">
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
                            <div class="scroll-remark">
                              <table class="table table-sm collapse show" id="remarks" style="white-space: pre-line">
                                <thead>
                                  <tr class="col-2"></tr>
                                  <tr class="col-3"></tr>
                                  <tr class="col-7"></tr>
                                </thead>
                                <tbody v-for="(remark, i) in this.activeCad.remarks" :key="i">
                                  <tr class="border">
                                    <td>{{formatDate(remark.created_at, 'HH:mm:ss')}}</td>
                                    <td>{{remark.unit ? remark.unit.callsign.callsign : remark.controller.callsign.callsign}}</td>
                                    <td>{{remark.remark}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="form-group px-3">
                              <textarea
                                class="form-control form-inline"
                                type="text"
                                name="remark"
                                id="remark"
                                placeholder="Type to add a remark"
                                v-on:keyup.enter="addRemark($event, activeCad.id)"
                                v-model="remark"
                                rows="3"
                              ></textarea>
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
                <div class="card-header bg-danger text-white">
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
import AvailableUnits from "./CAD/Available-Units";
export default {
  components: {
    Autocomplete,
    AvailableUnits
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
          id: 7,
          name: "Other Assignment"
        },
        {
          id: 8,
          name: "Stop"
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
  },
  mounted: function() {
    this.timeBegan = null;
    this.timeStopped = null;
    this.stoppedDuration = 0;
    this.started = null;
    this.running = false;
    this.currentTime();
    Echo.private('fms-channel')
    .listen('.newRemark', (data) => {
      if(data.remark.controller_id == this.position.id) return;
      if(data.remark.cad_id == this.activeCad.id) {
        this.activeCad.remarks.push(data.remark)
      } 
      this.cads.find(cad => {
        if (cad.id == data.remark.cad_id) {
          cad.remarks.push(data.remark);
        }
      });
    })
    .listen('.unitAssigned', (data) => {
      if(data.controller.id == this.position.id) return;
      console.log(data);
    })
    .listen('.unitDetached', (data) => {
      if(data.controller.id == this.position.id) return;
      console.log(data);
    });
    pncChannel.onmessage = msg => {
      document.getElementById('remark').value = msg;
    }
  },
  destroyed: function() {
    this.reset();
  },
  methods: {
    pncPopup: function() {
      let route = this.$router.resolve({path: '/pnc'});
      window.open(route.href,'newwindow', 'width=600,height=550,top=100,left=200');
    },
    createCad: function(e) {
      e.preventDefault();
      var timestamp = this.$moment().format('YYYY/MM/DD HH:mm:ss')
      var cadNumber = this.activeCad.cad_number;
      for (let i = 0; i < this.cads.length; i++) {
        const cad = this.cads[i];
        if (cad.cad_number > cadNumber) {
          cadNumber = cad.cad_number;
        }
      }
      var displayName = (cadNumber + 1).toString().padStart(5, "0") + '/' + this.$moment().format('DDMMMYY').toUpperCase().replace('.', ''); 
      
      this.$api
        .post('/api/cad/create', {
          caller_name: e.target.elements.caller_name.value,
          location: e.target.elements.location.value,
          response_level: e.target.elements.response.value,
          cad_number: cadNumber + 1,
          display_name: displayName,
          vrm: e.target.elements.vrm.value,
          description: e.target.elements.description.value,
          dateTime: timestamp
        })
        .then(response => {
          this.cads.push(response.data)
        })
        .catch(err => {
          console.log(err.response.data);
        });
      $('#createModal').modal('hide');
      $('#createCadForm').get(0).reset()
    },
    editCad: function(e) {
      e.preventDefault();
      this.$api
        .post('/api/cad/update', {
          id: this.activeCad.id,
          caller_name: e.target.elements.caller_name.value,
          location: e.target.elements.location.value,
          response_level: e.target.elements.response.value,
          vrm: e.target.elements.vrm2.value,
          description: e.target.elements.description.value
        })
        .then(response => {
          this.activeCad = response.data;
        })
        .catch(err => {
          console.log(err.response);
        })
        $('#editModal').modal('hide');
    },
    closeCad: function() {
      var oldCad = this.activeCad;
      var newCad = this.cads.splice(0, 1);
      this.activeCad = newCad[0];
      this.$api
      .post('/api/cad/close', {
        id: oldCad.id
      })
      .then(res => {
        console.log(res);
      })
      .catch(err => {
        console.log(err);
      })
    },
    formatDate: function(date, format) {
      if (date) {
        return this.$moment(String(date)).format(format);
      }
    },
    formatRemark: function(remark) {
      return remark.replace(/(?:\r\n|\r|\n)/g, '<br>');
    },
    stateTextColour: function(state) {
      switch (state) {
        case 0:
          return "text-danger";
        case 2:
          return "text-success";
        case 4:
          return "text-muted";
        case 5:
          return "text-warning";
        case 6:
          return "text-primary";
        case 7:
          return "text-secondary";
        case 8: 
          return "text-muted";
        case 9:
          return "text-secondary";
      }
    },
    remarkAdd: function(id, remark) {
      this.$api
        .post(`/api/cad/remark`, {
          id: id,
          remark: remark,
          unit: this.position.id
        })
        .catch(err => {
          console.log(err.response.data);
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
    detachUnit: function(unit) {
      var units = this.activeCad.units.find(obj => {
        return obj.id != unit.id
      })
      if (units == undefined) {
        this.activeCad.units = [];
      } else {
        this.activeCad.units = [units];
      }
      this.units.find(obj => {
        if (obj.id == unit.id) {
          obj.state = 2;
          obj.assigned_cad = null;
        }
      });
      this.$refs.availableUnits.stateSelect(2, unit);
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