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
              <li class="list-group-item">
                <div class="card shadow bg-success">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3>G101</h3>
                        <p>Available</p>
                        <div>
                          <font-awesome-icon icon="user" />&nbsp;R.Buckland
                        </div>
                        <div>
                          <font-awesome-icon icon="user" />&nbsp;R.Langdon
                        </div>
                        <div>
                          <font-awesome-icon icon="car" />&nbsp;GX69 MJH (GC)
                        </div>
                      </div>
                      <div class="col">
                        <span class="badge badge-pill badge-primary">Advanced</span>
                        <span class="badge badge-pill badge-warning">Taser</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="card shadow bg-warning">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3>TJ1</h3>
                        <p>En-Route</p>
                        <div>
                          <font-awesome-icon icon="user" />&nbsp;D.Pickard
                        </div>
                        <div>
                          <font-awesome-icon icon="car" />&nbsp;GX69 BNT (X5)
                        </div>
                      </div>
                      <div class="col">
                        <span class="badge badge-pill badge-primary">Tactical</span>
                        <span class="badge badge-pill badge-danger">Firearms</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="card shadow bg-secondary">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3>903</h3>
                        <p>At Scene</p>
                        <div>
                          <font-awesome-icon icon="user" />&nbsp;C.McGarel
                        </div>
                        <div>
                          <font-awesome-icon icon="user" />&nbsp;L.Livermore
                        </div>
                        <div>
                          <font-awesome-icon icon="car" />&nbsp;GX69 OLT (Focus)
                        </div>
                      </div>
                      <div class="col">
                        <span class="badge badge-pill badge-primary">Response</span>
                        <span class="badge badge-pill badge-warning">Taser</span>
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
                01/01/2020 19:44
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
                        <div class="d-flex">
                          <h5>CAD: 20200101-0001</h5>
                        </div>
                        <div class="float-right">
                          <p class="pull-right">Last Updated: 01/01/2020 19:40</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6 border">
                          <div class="row pt-4 no-gutters">
                            <div class="col border">
                              <p class="pl-2">Location</p>
                            </div>
                            <div class="col border">
                              <p class="pl-2">Response Level</p>
                            </div>
                            <div class="w-100"></div>
                            <div class="col border">
                              <p class="pl-2">INC Channel</p>
                            </div>
                            <div class="col border">
                              <p class="pl-2">Caller Name</p>
                            </div>
                          </div>
                          <div class="row py-4">
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Call Description</h5>
                                  <div class="card-text">The caller reported an abundence of memes</div>
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
                                <span class="text-success">TJ1</span>
                                <span class="text-secondary">903</span>
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
                      <tr v-on:click="clickList()" v-for="(cad,i) in this.cads" :key="i">
                        <td>{{cad[i].display_name}}</td>
                        <td v-if="cad[i].response == 'Immediate'" class="bg-danger text-white">Immediate</td>
                        <td>{{cad[i].response_level}}</td>
                        <td>{{cad[i].description}}</td>
                        <td>{{cad[i].location}}</td>
                      </tr>
                      <tr v-on:click="clickList()">
                        <td>20200101-0003</td>
                        <td class="bg-warning text-dark">Standard</td>
                        <td>INC3</td>
                        <td>Even more memes have been made</td>
                        <td>Airportos</td>
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
import axios from 'axios';
export default {
  data: function() {
    return {
      cads: [],
      time: "00:00:00:000"
    };
  },
  created: function() {
    this.fetchData();
  },
  mounted: function() {
    (this.timeBegan = null),
      (this.timeStopped = null),
      (this.stoppedDuration = 0),
      (this.started = null),
      (this.running = false);
  },
  destroyed: function() {
    this.reset();
  },
  methods: {
    fetchData: function() {
      this.cads = this.units = null
      axios
        .get('/api/cad/index')
        .then(response => {
          this.cads = [response.data.cads];
          this.units = response.data.units;
          console.log(this.cads)
        })
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

    zeroPrefix: function(num, digit) {
      var zero = "";
      for (var i = 0; i < digit; i++) {
        zero += "0";
      }
      return (zero + num).slice(-digit);
    },
    clickList: function() {
      console.log("Clicked on a cad");
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