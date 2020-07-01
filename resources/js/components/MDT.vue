<template>
  <div v-if="this.isLoading">
    <circle-spin :loading="isLoading"></circle-spin>
  </div>
  <div class="container h-100" style="background-color:#8387A2;" v-else>
    <div class="modal" tabindex="-1" role="dialog" id="pncDone">
      <div class="modal-dialog" role="document">
        <form id="addPncRemark" @submit="addPncRemark">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add as remark</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="remark">
                  <strong>Review before adding</strong>
                </label>
                <textarea
                  class="form-control"
                  name="remark"
                  id="remark"
                  rows="12"
                  :value="showPncRemark()"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Add Remark</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row pt-2 px-2 h-100 justify-content-around">
      <div class="pb-1">
        <button
          class="button btn btn-info"
          style="border-radius: 0 !important;"
          @click="stateSelect(5)"
        >En Route</button>
      </div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab == 'menu'}"
            id="menu-tab"
            data-toggle="tab"
            @click="prevTab = tab; tab = 'menu';"
            role="tab"
            aria-controls="menu"
            aria-selected="true"
          >Menu</button>
        </li>
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab == 'status'}"
            id="status-tab"
            data-toggle="tab"
            @click="prevTab = tab; tab = 'status'"
            role="tab"
            aria-controls="status"
            aria-selected="false"
          >Status</button>
        </li>
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab.includes('pnc')}"
            id="pnc-tab"
            data-toggle="tab"
            @click="pncIndex"
            role="tab"
            aria-controls="pnc"
            aria-selected="false"
          >PNC</button>
        </li>
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab == 'cad'}"
            id="cad-tab"
            data-toggle="tab"
            @click="prevTab = tab; tab = 'cad'"
            role="tab"
            aria-controls="cad"
            aria-selected="false"
          >CAD</button>
        </li>
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab == 'text'}"
            id="text-tab"
            data-toggle="tab"
            @click="prevTab = tab; tab = 'text'"
            role="tab"
            aria-controls="text"
            aria-selected="false"
          >Text</button>
        </li>
        <li class="nav-item">
          <button
            class="nav-link btn-info"
            :class="{'active': tab == 'map'}"
            id="map-tab"
            data-toggle="tab"
            @click="prevTab = tab; tab = 'map'"
            role="tab"
            aria-controls="map"
            aria-selected="false"
          >Map</button>
        </li>
      </ul>
      <div class="pb-1">
        <div class="button btn btn-info" style="border-radius: 0 !important;">Suspend</div>
      </div>
    </div>
    <div class="row px-2">
      <div class="container mb-2" style="background-color:#DBE1E6; min-height:560px !important;">
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'menu'}"
            id="menu"
            role="tabpanel"
            aria-labelledby="menu-tab"
          >
            <div class="row mt-4">
              <div class="col text-center">
                <h2>{{this.unit.callsign.callsign}}</h2>
              </div>
            </div>
            <div class="row my-2">
              <div class="col-6">
                <div class="row my-2">
                  <div class="col text-center">Vehicle Details</div>
                </div>
                <div class="row justify-content-center">
                  <form>
                    <div class="col text-center form-group">
                      <label for="model" class="my-2">Model</label>
                      <input
                        class="form-control"
                        type="text"
                        name="model"
                        id="unitModel"
                        disabled
                        :value="unit.vehicle.model"
                      />
                      <label for="vrm" class="my-2">VRM</label>
                      <input
                        class="form-control"
                        type="text"
                        name="vrm"
                        id="unitVrm"
                        disabled
                        :value="unit.vehicle.vrm"
                      />
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-6">
                <div class="row my-2">
                  <div class="col text-center">Users</div>
                </div>
                <div class="row justify-content-center">
                  <textarea
                    name="users"
                    id="users"
                    rows="5"
                    cols="30"
                    disabled
                    :value="showUsers()"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'status'}"
            id="status"
            role="tabpanel"
            aria-labelledby="status-tab"
          >
            <div class="row ml-5 my-2">
              <div class="col-6 col-md-4 text-center">
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='5'}"
                    @click="stateSelect(5)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >En Route</button>
                </div>
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='4'}"
                    @click="stateSelect(4)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >Refreshments</button>
                </div>
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='7'}"
                    @click="stateSelect(7)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >Other Assignment</button>
                </div>
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='8'}"
                    @click="stateSelect(8)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >Stop</button>
                </div>
              </div>
              <div class="col-6 col-md-4 align-self-center">
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='2'}"
                    @click="stateSelect(2)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >On Patrol</button>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='6'}"
                    @click="stateSelect(6)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >At Scene</button>
                </div>
                <div class="row py-2">
                  <button
                    type="button"
                    :class="{'active': state=='9'}"
                    @click="stateSelect(9)"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >Prisioner</button>
                </div>
                <div class="row py-2">
                  <div class="btn-spacer"></div>
                </div>
                <div class="row py-2">
                  <button
                    type="button"
                    class="btn btn-muted btn-xlg"
                    style="border-radius: 0 !important;"
                  >Log Off</button>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'pnc'}"
            id="pnc"
            role="tabpanel"
            aria-labelledby="pnc-tab"
          >
            <div class="row mx-3 my-2">
              <form class="w-100" @submit="searchVehicle">
                <div class="col">
                  <div class="row w-100">
                    <div class="col form-group">
                      <label for="vehicleSearch">
                        <strong>Search a VRM</strong>
                      </label>
                      <input
                        type="text"
                        name="vehicleSearch"
                        id="vehicleSearch"
                        class="form-control"
                        placeholder="AB12 CDE"
                      />
                      <p id="vehicleValidation"></p>
                    </div>
                  </div>
                </div>
              </form>
              <form class="w-100" @submit="searchPerson">
                <div class="col">
                  <div class="row w-100">
                    <div class="col form-group">
                      <label for="personSearch">
                        <strong>Search a person</strong>
                      </label>
                      <input
                        type="text"
                        name="personSearch"
                        id="personSearch"
                        class="form-control"
                        placeholder="LAST NAME\FIRST NAME\DDMMYYYY"
                      />
                      <p id="personValidation"></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'pncpers'}"
            id="pncpers"
            role="tabpanel"
            aria-labelledby="pncpers-tab"
          >
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="col">
                  <div class="row w-100">
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="first_name">
                          <strong>First Name</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="row py-1">
                        <input
                          type="text"
                          class="form-control"
                          name="first_name"
                          id="first_name"
                          :value="pncPerson.first_name"
                          disabled
                        />
                      </div>
                    </div>
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="last_name">
                          <strong>Last Name</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="row py-1">
                        <input
                          type="text"
                          class="form-control"
                          name="last_name"
                          id="last_name"
                          :value="pncPerson.last_name"
                          disabled
                        />
                      </div>
                    </div>
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2 text-right">
                        <label for="dob">
                          <strong>Date of Birth</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="row py-1">
                        <input
                          type="text"
                          class="form-control"
                          name="dob"
                          id="dob"
                          :value="pncPerson.dob"
                          disabled
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="address">
                          <strong>Address</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="row py-1">
                        <textarea
                          class="form-control"
                          name="address"
                          id="address"
                          rows="2"
                          disabled
                          :value="pncPerson.address"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="notes">
                          <strong>Notes</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="row py-1">
                        <textarea
                          class="form-control"
                          name="notes"
                          id="notes"
                          rows="3"
                          disabled
                          :value="pncPerson.notes ? pncPerson.notes : ''"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="markers">
                          <strong>Markers</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="row py-1">
                        <textarea
                          class="form-control"
                          name="markers"
                          id="markers"
                          rows="4"
                          disabled
                          :value="pncPerson.markers ? showMarkers() : ''"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-md-1 mr-1">
                      <div class="row justify-content-end mt-2">
                        <label for="aliases">
                          <strong>Aliases</strong>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="row py-1">
                        <textarea
                          class="form-control"
                          name="aliases"
                          id="aliases"
                          rows="4"
                          disabled
                          :value="pncPerson.aliases ? showAliases() : ''"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100 justify-content-center">
                    <a
                      type="button"
                      href="#"
                      data-target="#pncDone"
                      data-toggle="modal"
                      class="button btn btn-pnc-nav h-100 w-25"
                      style="border-radius: 0 !important;"
                    >Done</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'pncveh'}"
            id="pncveh"
            role="tabpanel"
            aria-labelledby="pncveh-tab"
          >
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="col">
                  <div class="row w-100">
                    <div class="col form-group">
                      <label for="vrmpnc">
                        <strong>VRM</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="vrmpnc"
                        id="vrmpnc"
                        :value="pncVehicle.vrm"
                        disabled
                      />
                    </div>
                    <div class="col-3 form-group">
                      <label for="make">
                        <strong>Make</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="make"
                        id="make"
                        :value="pncVehicle.make"
                        disabled
                      />
                    </div>
                    <div class="col-3 form-group w-100">
                      <label for="model">
                        <strong>Model</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="model"
                        id="model"
                        :value="pncVehicle.model"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="row mr-3">
                    <div class="col">
                      <div class="form-group">
                        <label for="insurer">
                          <strong>Insurers Details</strong>
                        </label>
                        <input
                          class="form-control"
                          type="text"
                          name="insurer"
                          id="insurer"
                          value="Admiral"
                          disabled
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-4 form-group">
                      <label for="number">
                        <strong>Policy Number</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="number"
                        id="number"
                        :value="pncVehicle.policy_number"
                        disabled
                      />
                    </div>
                    <div class="col-4 form-group">
                      <label for="from">
                        <strong>Valid From</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="from"
                        id="from"
                        :value="pncVehicle.from"
                        disabled
                      />
                    </div>
                    <div class="col-4 form-group">
                      <label for="to">
                        <strong>Valid To</strong>
                      </label>
                      <input
                        class="form-control"
                        type="text"
                        name="to"
                        id="to"
                        :value="pncVehicle.to"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="mr-5" for="otherVehicle">
                        <strong>Allowed to drive other vehicles</strong>
                      </label>
                      <input
                        class="input-xs"
                        type="text"
                        name="otherVehicle"
                        id="otherVehicle"
                        :value="pncVehicle.other_vehicles"
                        disabled
                      />
                      <strong>M means Motorcycle</strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="details">
                          <strong>Policyholder Details</strong>
                        </label>
                        <textarea
                          class="form-control"
                          name="details"
                          id="details"
                          rows="3"
                          disabled
                          :value="pncVehicle.civ ? showPolicyholder() : ''"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col">
                      <div
                        class="button btn btn-pnc-disabled h-100 w-100"
                        style="border-radius: 0 !important;"
                      >Previous</div>
                    </div>
                    <div class="col py-1 ml-5">
                      <span class="align-text-top">
                        <strong>Page 1 of 2</strong>
                      </span>
                    </div>
                    <div class="col pr-5">
                      <button
                        class="button btn btn-pnc-nav h-100 w-100"
                        id="next-pnc"
                        @click="prevTab = tab; tab='pncveh2'"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="pncveh2"
                        aria-selected="false"
                        style="border-radius: 0 !important;"
                      >Next</button>
                    </div>
                    <div class="col">
                      <a
                        type="button"
                        href="#"
                        data-target="#pncDone"
                        data-toggle="modal"
                        class="button btn btn-pnc-nav h-100 w-100"
                        style="border-radius: 0 !important;"
                      >Done</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'pncveh2'}"
            id="pncveh2"
            role="tabpanel"
            aria-labelledby="pncveh2-tab"
          >
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="col">
                  <div class="row">
                    <div class="col form-group">
                      <label for="drivers">
                        <strong>Permitted Drivers</strong>
                      </label>
                      <textarea
                        class="form-control"
                        name="drivers"
                        id="drivers"
                        rows="2"
                        disabled
                        :value="pncVehicle.permitted_drivers"
                      ></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="use">
                        <strong>Class of Use</strong>
                      </label>
                      <textarea
                        class="form-control"
                        name="use"
                        id="use"
                        rows="2"
                        disabled
                        :value="pncVehicle.use"
                      ></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="named">
                        <strong>Named Drivers</strong>
                      </label>
                      <textarea
                        class="form-control"
                        name="named"
                        id="named"
                        rows="6"
                        disabled
                        :value="pncVehicle.named_drivers ? showNamedDrivers() : ''"
                      ></textarea>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col">
                      <button
                        class="button btn btn-pnc-nav h-100 w-100"
                        id="prev-pnc"
                        data-toggle="tab"
                        @click="prevTab = tab; tab='pncveh'"
                        role="tab"
                        aria-controls="pncveh"
                        aria-selected="false"
                        style="border-radius: 0 !important;"
                      >Previous</button>
                    </div>
                    <div class="col py-1 ml-5">
                      <span class="align-text-top">
                        <strong>Page 2 of 2</strong>
                      </span>
                    </div>
                    <div class="col pr-5">
                      <div
                        class="button btn btn-pnc-disabled h-100 w-100"
                        style="border-radius: 0 !important;"
                      >Next</div>
                    </div>
                    <div class="col">
                      <a
                        type="button"
                        href="#"
                        data-target="#pncDone"
                        data-toggle="modal"
                        class="button btn btn-pnc-nav h-100 w-100"
                        style="border-radius: 0 !important;"
                      >Done</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'cad'}"
            id="cad"
            role="tabpanel"
            aria-labelledby="cad-tab"
          >
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="row">
                  <div class="col-md-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="cad">
                        <strong>CAD</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="cad"
                        id="cad"
                        :value="this.cad != undefined && this.cad.cad_number ? this.cad.cad_number.toString().padStart(5, '0') : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-2 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="dateTime">
                        <strong>Time&Date</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="dateTime"
                        id="dateTime"
                        :value="this.cad != null && this.cad.created_at ? formatDate(this.cad.created_at, 'HHmm DDMMYYYY') : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="grade">
                        <strong>Grade</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="grade"
                        id="grade"
                        :value="this.cad != null && this.cad.response_level ? this.cad.response_level.charAt(0) : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-sm-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="location">
                        <strong>Location</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-10 pr-2">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="location"
                        id="location"
                        :value="this.cad ? this.cad.location : ''"
                        disabled
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="name">
                        <strong>Name</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        :value="this.cad ? this.cad.caller_name : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="row justify-content-end mt-2">
                      <label for="vrm">
                        <strong>VRM</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2 mx-1">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="vrm"
                        id="vrm"
                        :value="this.cad != null && this.cad.vrm ? this.cad.vrm : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-md-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="tel">
                        <strong>Tel</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="tel"
                        id="tel"
                        :value="this.cad != null && this.cad.telephone ? this.cad.telephone : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="row justify-content-end mt-2">
                      <label for="toa">
                        <strong>TOA</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2 mx-1">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="toa"
                        id="toa"
                        :value="this.unit.toa ? this.unit.toa.toString().padStart('4',0) : ''"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-sm-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="remarks">
                        <strong>Remarks</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-10 pr-2 scroll">
                    <div class="row py-1 h-100">
                      <div class="card w-100">
                        <table
                          class="table table-sm collapse show mdt-cad-table"
                          id="remarks"
                          style="white-space: pre-line"
                        >
                          <thead>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                          </thead>
                          <template
                            v-if="this.cad != null && (this.cad.remarks || this.cad.description)"
                          >
                            <tbody>
                              <tr class="border" v-if="this.cad != null && this.cad.description">
                                <td>{{formatDate(this.cad.created_at, 'HH:mm:ss')}}</td>
                                <td>Opening Remark</td>
                                <td>{{this.cad.description}}</td>
                              </tr>
                            </tbody>
                            <tbody v-for="(remark, i) in this.cad.remarks" :key="i">
                              <tr class="border">
                                <td>{{formatDate(remark.created_at, 'HH:mm:ss')}}</td>
                                <td>{{remark.unit ? remark.unit.callsign.callsign : remark.controller.callsign.callsign}}</td>
                                <td>{{remark.remark}}</td>
                              </tr>
                            </tbody>
                          </template>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="remark-add">
                        <strong>Add Remark</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="row py-1">
                      <textarea
                        type="text"
                        class="form-control"
                        name="remark-add"
                        id="remark-add"
                        v-on:keyup.enter="addRemark($event, cad.id)"
                        :value="remark"
                        rows="3"
                      ></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1 mr-1">
                    <div class="row justify-content-end mt-2">
                      <label for="units">
                        <strong>Assigned</strong>
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="row py-1">
                      <input
                        type="text"
                        class="form-control"
                        name="units"
                        id="units"
                        :value="assigned"
                        disabled
                      />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'text'}"
            id="text"
            role="tabpanel"
            aria-labelledby="text-tab"
          >TEXT</div>
          <div
            class="tab-pane fade show"
            :class="{'active': tab == 'map'}"
            id="map"
            role="tabpanel"
            aria-labelledby="map-tab"
          >MAP</div>
        </div>
      </div>
    </div>
    <div class="row py-2">
      <div class="col">
        <button
          class="button btn btn-info h-100 w-100"
          style="border-radius: 0 !important; color: yellow;"
        >IN COV</button>
      </div>
      <div class="col col-2">
        <button
          class="button btn h-100 w-100"
          :class="stateFormat()"
          style="border-radius: 0 !important;"
        >{{this.displayState()}}</button>
      </div>
      <div class="col">
        <button
          class="button btn btn-info h-100 w-100"
          style="border-radius: 0 !important;"
          @click="temp = tab; tab = prevTab; prevTab = temp;"
        >Back</button>
      </div>
      <div class="col">
        <button
          class="button btn btn-info h-100 w-100"
          style="border-radius: 0 !important; color: yellow;"
        >{{timeNow}}</button>
      </div>
      <div class="col">
        <div class="button btn btn-info h-100 w-100" style="border-radius: 0 !important;"></div>
      </div>
      <div class="col">
        <div class="button btn btn-info h-100 w-100" style="border-radius: 0 !important;"></div>
      </div>
      <div class="col">
        <div class="button btn btn-info h-100 w-100" style="border-radius: 0 !important;"></div>
      </div>
      <div class="col d-flex justify-content-center text-center">
        <button
          class="button btn btn-danger h-100 w-100"
          style="border-radius: 0 !important;"
          @click="stateSelect(0)"
        >Urgent Assistance</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      state: "",
      tab: "status",
      prevTab: "",
      pnc: "",
      pncPerson: [],
      pncVehicle: [],
      timeNow: "",
      cad: [],
      unit: "",
      isLoading: true,
      remark: "",
      assigned: ""
    };
  },
  created: function() {
    this.fetchData();
  },
  mounted: function() {
    this.currentTime();
    Echo.private("fms-channel")
      .listen(".newRemark", data => {
        if (data.remark.unit_id == this.unit.id) return;
        this.cad.remarks.push(data.remark);
      })
      .listen(".unitAssigned", data => {
        if (this.emptyCad() && data.unit.id != this.unit.id) {
          return;
        } else if (this.emptyCad() && data.unit.id == this.unit.id) {
          this.cad = data.unit.cad;
          this.state = 5;
          this.assignedUnits();
        } else if (
          this.cad.id == data.unit.assigned_cad &&
          data.unit.id != this.unit.id
        ) {
          for (let i = 0; i < data.unit.length; i++) {
            const elem = data.unit[i];
            if (elem == "cad") {
              data.unit.splice(i, 1);
            }
          }
          this.cad.units.push(data.unit);
          this.assignedUnits();
        }
      })
      .listen(".unitDetached", data => {
        if (this.emptyCad() && data.unit.id != this.unit.id) {
          return;
        } else if (!this.emptyCad() && data.unit.id == this.unit.id) {
          this.cad = [];
          this.assigned = "";
          this.state = 2;
        } else if (!this.emptyCad() && data.unit.id != this.unit.id) {
          var filtered = this.cad.units.filter(unit => {
            return unit.id != data.unit.id;
          });
          this.cad.units = filtered;
          this.assignedUnits();
        }
      })
      .listen(".updateState", data => {
        if (data.unit.id != this.unit.id) return;
        this.state = data.unit.state;
        this.unit.state = data.unit.state
      })
  },
  methods: {
    displayName: function(name) {
      const initial = name.substr(0, 1);
      const lastName = name.split(" ")[1];
      return `${initial}.${lastName}`;
    },
    showUsers: function() {
      let userString = "";
      for (let i = 0; i < this.unit.users.length; i++) {
        const user = this.unit.users[i];
        userString += `${this.displayName(user.user.name)} - ${
          user.shoulder_number
        }\n`;
      }
      return userString;
    },
    emptyCad: function() {
      for (var key in this.cad) {
        if (this.cad.hasOwnProperty(key)) {
          return false;
        }
      }
      return true;
    },
    fetchData: function() {
      this.cad = this.unit = [];
      this.$api
        .get("/api/mdt/index")
        .then(response => {
          if (response.data.cad != null) {
            this.cad = response.data.cad;
          }
          this.unit = response.data.unit;
          this.state = this.unit.state;
          this.isLoading = false;
          if (this.cad != undefined && this.cad.length > 0) {
            this.assignedUnits();
          }
        })
        .catch(error => {
          console.log(error);
          this.cad = {};
          this.unit = [];
        });
    },
    addRemark: function(event, id) {
      if (event.target.value.length > 0) {
        const remark = {
          created_at: this.$moment().format(),
          unit: {
            callsign: {
              callsign: this.unit.callsign.callsign
            }
          },
          remark: event.target.value
        };
        this.remark = "";
        this.cad.remarks.push(remark);
        this.remarkAdd(id, event.target.value);
      }
    },
    remarkAdd: function(id, remark) {
      this.$api
        .post(`/api/mdt/remark`, {
          id: id,
          remark: remark,
          unit: this.unit.id
        })
        .catch(err => {
          console.log(err);
        });
    },
    showPncRemark: function() {
      let remarkString = "";
      if (this.pnc == "person") {
        for (const [key, value] of Object.entries(this.pncPerson)) {
          if (key == "id" || key == "created_at" || key == "updated_at")
            continue;
          if (key.includes("_")) {
            let key = key.replace(/_/g, " ");
            remarkString += this.capitalizeFirstLetter(key) + `: ${value}\n`;
            continue;
          }
          if (key == "markers" && value) {
            remarkString +=
              this.capitalizeFirstLetter(key) + `: ${this.showMarkers()}\n`;
            continue;
          }
          if (key == "aliases" && value) {
            remarkString +=
              this.capitalizeFirstLetter(key) + `: ${this.showAliases()}\n`;
            continue;
          }
          if (key == "dob") {
            remarkString += "Date of Birth: " + value + "\n";
            continue;
          }
          if (value == null || value == "") {
            remarkString += this.capitalizeFirstLetter(key) + ": Nil\n";
            continue;
          }
          remarkString += this.capitalizeFirstLetter(key) + `: ${value}\n`;
        }
      } else if (this.pnc == "vehicle") {
        for (const [key, value] of Object.entries(this.pncVehicle)) {
          if (key == undefined) continue;
          if (
            key == "id" ||
            key == "created_at" ||
            key == "updated_at" ||
            key == "civ_id"
          )
            continue;
          if (key == "named_drivers") {
            remarkString += `Named Drivers: ${this.showNamedDrivers()}\n`;
            continue;
          }
          if (key == "vrm") {
            remarkString += `VRM: ${value}\n`;
            continue;
          }
          if (key.includes("_")) {
            if (value == null || value == "") {
              let newKey = key.replace(/_/g, " ");
              remarkString += this.capitalizeFirstLetter(newKey) + ": Nil\n";
              continue;
            } else {
              let newKey = key.replace(/_/g, " ");
              remarkString +=
                this.capitalizeFirstLetter(newKey) + `: ${value}\n`;
              continue;
            }
          }
          if (key == "civ") {
            remarkString += `Policyholder Details: ${this.showPolicyholder()}\n`;
            continue;
          }
          if (value == null || value == "") {
            remarkString += this.capitalizeFirstLetter(key) + ": Nil\n";
            continue;
          }
          remarkString += this.capitalizeFirstLetter(key) + `: ${value}\n`;
        }
      }
      remarkString = remarkString.substring(0, remarkString.length - 1);
      return remarkString;
    },
    addPncRemark: function(e) {
      e.preventDefault();
      this.pncVehicle = [];
      this.pncPerson = [];
      this.pnc = "";
      $("#pncDone").modal("hide");
      this.tab = "cad";
      this.remark = e.target.elements.remark.value;
    },
    capitalizeFirstLetter: function(str) {
      str = str.split(" ");

      for (var i = 0, x = str.length; i < x; i++) {
        str[i] = str[i][0].toUpperCase() + str[i].substr(1);
      }

      return str.join(" ");
    },
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
            this.pncPerson = res.data;
            this.pnc = "person";
            this.tab = "pncpers";
          } else {
            document.getElementById("personValidation").innerHTML = "No trace";
          }
        })
        .catch(err => {
          console.log(err.response.data);
        });
    },
    searchVehicle: function(e) {
      e.preventDefault();
      this.$api
        .post("/api/pnc/vehicle", {
          search: e.target.elements.vehicleSearch.value
        })
        .then(res => {
          if (res.data.length != 0) {
            this.pncVehicle = res.data;
            this.pnc = "vehicle";
            this.tab = "pncveh";
          } else {
            document.getElementById("vehicleValidation").innerHTML = "No trace";
          }
        })
        .catch(err => {
          console.log(err.response.data);
        });
    },
    showAliases: function() {
      let aliasString = "";
      this.pncPerson.aliases.forEach(
        (item, i) => (aliasString += i + 1 + ". " + item + "\n")
      );
      aliasString = aliasString.substring(0, aliasString.length - 1);
      return aliasString;
    },
    showMarkers: function() {
      let markerString = "";
      this.pncPerson.markers.forEach(
        (item, i) =>
          (markerString += item.name + " - " + item.abbreviation + "\n")
      );
      markerString = markerString.substring(0, markerString.length - 1);
      return markerString;
    },
    showPolicyholder: function() {
      let detailString = "";
      detailString +=
        this.pncVehicle.civ.first_name +
        " " +
        this.pncVehicle.civ.last_name +
        ", " +
        this.pncVehicle.civ.address;
      return detailString;
    },
    showNamedDrivers: function() {
      let namedDriversString = "";
      this.pncVehicle.named_drivers.forEach(
        (item, i) => (namedDriversString += i + 1 + ". " + item + "\n")
      );
      namedDriversString = namedDriversString.substring(
        0,
        namedDriversString.length - 1
      );
      return namedDriversString;
    },
    formatDate: function(date, format) {
      return this.$moment(date).format(format);
    },
    currentTime: function() {
      this.timeNow = this.$moment().format("HH:mm");

      setTimeout(this.currentTime, 1000);
    },
    assignedUnits: function() {
      this.assigned = "";
      for (let i = 0; i < this.cad.units.length; i++) {
        const unit = this.cad.units[i];
        this.assigned = this.assigned + " " + unit.callsign.callsign;
      }
      return this.assigned;
    },
    pncIndex: function() {
      if (!this.pnc) {
        this.prevTab = this.tab;
        this.tab = "pnc";
      } else if (this.pnc == "vehicle") {
        this.prevTab = this.tab;
        this.tab = "pncveh";
      } else if (this.pnc == "person") {
        this.prevTab = this.tab;
        this.tab = "pncpers";
      }
    },
    dissociateUnit: function() {
      this.unit.assigned_cad = null;
      this.$api
        .post('/api/mdt/dissociate', {
          id: this.unit.id,
          state: this.state,
          assigned_cad: this.unit.assigned_cad
        })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        })
    },
    stateSelect: function(state) {
      switch (state) {
        case 0:
          this.state = 0;
          this.updateState();
          break;
        case 2:
          this.state = 2;
          if (this.cad) {
            this.dissociateUnit();
            this.cad = "";
          }
          this.updateState();
          break;
        case 4:
          this.state = 4;
          if (this.cad) {
            this.dissociateUnit();
            this.cad = "";
          }
          this.updateState();
          break;
        case 5:
          this.state = 5;
          this.updateState();
          break;
        case 6:
          this.state = 6;
          this.updateState();
          break;
        case 7:
          this.state = 7;
          this.updateState();
          break;
        case 8:
          this.state = 8;
          this.updateState();
          break;
        case 9:
          this.state = 9;
          this.updateState();
          break;
      }
    },
    displayState: function() {
      switch (this.state) {
        case 0:
          return "URGENT ASSISTANCE";
        case 2:
          return "ON PATROL";
        case 4:
          return "REFRESHMENTS";
        case 5:
          return "EN ROUTE";
        case 6:
          return "AT SCENE";
        case 7: 
          return "OTHER ASSIGNMENT";
        case 8:
          return "STOP";
        case 9:
          return "PRISIONER TRANSPORT";
      }
    },
    stateFormat: function() {
      switch (this.state) {
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
    updateState: function() {

    }
  }
};
</script>

<style>
</style>