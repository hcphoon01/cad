<template>
  <div class="container-fluid py-4 h-100">
    <div class="card h-100">
      <div class="card-header">EmergencyRP CAD</div>
      <div class="row py-4 px-4 h-100">
        <div class="col-md-3">
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
                        <h3>{{unit.callsign}}</h3>
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
                <a class="btn btn-primary" href="#" role="button">Create CAD</a>
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
              <span class="badge badge-pill badge-primary text-wrap" style="width: 8rem;">
                {{dateNow}}
                H.Cameron Oscar 1
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
                              <input
                                class="form-control input-lg"
                                type="text"
                                name="assignUnit"
                                id="assignUnit"
                                v-on:keyup.enter="assignUnit"
                              />
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
                                >{{unit.callsign}}</span>
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
                              <tbody>
                                <tr class="border">
                                  <td>19:40:42</td>
                                  <td>Oscar 1</td>
                                  <td>CAD Created</td>
                                </tr>
                                <tr class="border">
                                  <td>19:40:45</td>
                                  <td>Oscar 1</td>
                                  <td>G102 Attached</td>
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
                                v-on:keyup.enter="addRemark"
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
                      <tr v-on:click="clickList(cad, i)" v-for="(cad,i) in this.cads" :key="i">
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
export default {
  data: function() {
    return {
      time: "00:00:00:000",
      units: [],
      cads: [],
      activeCad: [],
      dateNow: ''
    };
  },
  created: function() {
    this.fetchData();
    this.getActiveCad();
  },
  mounted: function() {
    (this.timeBegan = null),
      (this.timeStopped = null),
      (this.stoppedDuration = 0),
      (this.started = null),
      (this.running = false);
      this.currentTime()
  },
  destroyed: function() {
    this.reset();
  },
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
      switch (state) {
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
      }
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
    getActiveCad: function(id = null) {
      let url;
      if (id) {
        url = `/api/cad/${id}`;
      } else {
        url = "/api/cad";
      }
      this.$api
        .get(url)
        .then(response => {
          this.activeCad = response.data;
        })
        .catch(error => {
          this.activeCad = [];
        });
    },
    fetchData: function() {
      this.cads = this.units = null;
      this.$api
        .get("/api/cad/index")
        .then(response => {
          this.cads = response.data.cads;
          this.cads.shift();
          this.units = response.data.units;
        })
        .catch(error => {
          this.cads = [];
          this.units = [];
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
      console.log(cad);
      this.cads.splice(index, 1);
      this.cads.push(this.activeCad);
      this.activeCad = cad;
    },
    clickUnit: function() {
      console.log("Clicked a unit");
    },
    addRemark: function(event) {
      console.log(event.target.value);
    },
    assignUnit: function(event) {
      console.log(event.target.value);
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