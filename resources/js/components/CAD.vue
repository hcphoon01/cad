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
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3>G101</h3>
                        <div>
                          <font-awesome-icon icon="user" /> R.Buckland
                        </div>
                        <div>
                          <font-awesome-icon icon="user" /> R.Langdon
                        </div>
                        <div>
                          <font-awesome-icon icon="car" /> GX69 MJH (GC)
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
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3>TJ1</h3>
                        <div>
                          <font-awesome-icon icon="user" /> D.Pickard
                        </div>
                        <div>
                          <font-awesome-icon icon="car" /> GX69 BNT (X5)
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
                <button type="button" class="btn btn-primary">Start Pursuit Timer</button>
              </div>
              <div class="vw-10 px-2">
                <input
                  type="text"
                  class="form-control"
                  name="timer"
                  id="timer"
                  placeholder="04:34"
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
                              />
                            </div>
                          </div>
                          <div class="row no-gutters">
                            <div class="col border">
                              <h6 class="pl-2">Assigned: G101</h6>
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
                            <div class="card-header">CAD Remarks</div>
                            <table class="table table-sm">
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
                      <tr v-on:click="clickList()">
                        <td>20200101-0002</td>
                        <td>Immediate</td>
                        <td>INC2</td>
                        <td>Some more memes have been made</td>
                        <td>Grove Street</td>
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
  methods: {
    clickList: function() {
      console.log("Clicked on a cad");
    }
  }
};
</script>

<style scoped>
</style>