<template>
  <div class="container h-100" style="background-color:#8387A2;">
    <div class="row pt-2 px-2 h-100 justify-content-around">
      <div class="pb-1">
        <div class="button btn btn-info" style="border-radius: 0 !important;">En Route</div>
      </div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link btn-info" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info active" id="pnc-tab" data-toggle="tab" href="#pnc" role="tab" aria-controls="pnc" aria-selected="false">PNC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info" id="cad-tab" data-toggle="tab" href="#cad" role="tab" aria-controls="cad" aria-selected="false">CAD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info" id="text-tab" data-toggle="tab" href="#text" role="tab" aria-controls="text" aria-selected="false">Text</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
        </li>
      </ul>
      <div class="pb-1">
        <div class="button btn btn-info" style="border-radius: 0 !important;">Suspend</div>
      </div>
    </div>
    <div class="row px-2">
      <div class="container mb-2" style="background-color:#DBE1E6;">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="menu" role="tabpanel" aria-labelledby="menu-tab">
            Test
          </div>
          <div class="tab-pane fade show" id="status" role="tabpanel" aria-labelledby="status-tab">
            <div class="row ml-5 my-2">
              <div class="col-6 col-md-4 text-center">
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">En Route</button>
                </div>
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">Refreshments</button>
                </div>
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">Other Assignment</button>
                </div>
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">Stop</button>
                </div>
              </div>
              <div class="col-6 col-md-4 align-self-center">
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">On Patrol</button>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">At Scene</button>
                </div>
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">Prisioner</button>
                </div>
                <div class="row py-2">
                  <div class="btn-spacer"></div>
                </div>
                <div class="row py-2">
                  <button type="button" name="" id="" class="btn btn-info btn-xlg" style="border-radius: 0 !important;">Log Off</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="pnc" role="tabpanel" aria-labelledby="pnc-tab">
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="col">
                  <div class="row w-100">
                    <div class="col form-group">
                      <label for="vrm"><strong>VRM</strong></label>
                      <input class="form-control" type="text" name="vrm" id="vrm" value="SW13 AGD" disabled>
                    </div>
                    <div class="col-3 form-group">
                      <label for="make"><strong>Make</strong></label>
                      <input class="form-control" type="text" name="make" id="make" value="Ford" disabled>
                    </div>
                    <div class="col-3 form-group w-100">
                      <label for="model"><strong>Model</strong></label>
                      <input class="form-control" type="text" name="model" id="model" value="Focus" disabled>
                    </div>
                  </div>
                  <div class="row mr-3">
                    <div class="col">
                      <div class="form-group">
                        <label for="insurer"><strong>Insurers Details</strong></label>
                        <input class="form-control" type="text" name="insurer" id="insurer" value="Admiral" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                    <div class="col-4 form-group">
                      <label for="number"><strong>Policy Number</strong></label>
                      <input class="form-control" type="text" name="number" id="number" value="D993314X" disabled>
                    </div>
                    <div class="col-4 form-group">
                      <label for="from"><strong>Valid From</strong></label>
                      <input class="form-control" type="text" name="from" id="from" value="05/02/2019" disabled>
                    </div>
                    <div class="col-4 form-group">
                      <label for="to"><strong>Valid To</strong></label>
                      <input class="form-control" type="text" name="to" id="to" value="05/02/2020" disabled>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <label class="mr-5" for="otherVehicle"><strong>Allowed to drive other vehicles</strong></label>
                        <input class="input-xs" type="text" name="otherVehicle" id="otherVehicle" value="Y" disabled>
                        <strong>M means Motorcycle</strong>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="details"><strong>Policyholder Details</strong></label>
                        <textarea class="form-control" name="details" id="details" rows="3" disabled>Mr Dude, Some Place, Some City, Some Postcode</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row w-100">
                      <div class="col">
                        <div class="button btn btn-pnc-disabled h-100 w-100" style="border-radius: 0 !important;">Previous</div>
                      </div>
                      <div class="col py-1 ml-5">
                        <span class="align-text-top"><strong>Page 1 of 2</strong></span>
                      </div>
                      <div class="col pr-5">
                         <div class="button btn btn-pnc-nav h-100 w-100" id="pnc2-tab" data-toggle="tab" href="#pnc2" role="tab" aria-controls="pnc2" aria-selected="false" style="border-radius: 0 !important;">Next</div>
                      </div>
                      <div class="col">
                        <div class="button btn btn-pnc-nav h-100 w-100" style="border-radius: 0 !important;">Done</div>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade show" id="pnc2" role="tabpanel" aria-labelledby="pnc2-tab">
            <div class="row mx-3 my-2">
              <form class="w-100">
                <div class="col">
                  <div class="row">
                    <div class="col form-group">
                      <label for="drivers"><strong>Permitted Drivers</strong></label>
                      <textarea class="form-control" name="drivers" id="drivers" rows="2">Mr Else, JoJo</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="use"><strong>Class of Use</strong></label>
                      <textarea class="form-control" name="use" id="use" rows="2">Social, Domestic, Pleasure and Commuting</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="named"><strong>Named Drivers</strong></label>
                      <textarea class="form-control" name="named" id="named" rows="3">1. Joe Bloggs&#13;&#10;2. Joe Smith&#13;&#10;3. Joe Mama</textarea>
                    </div>
                  </div>
                  <div class="row w-100">
                      <div class="col">
                        <div class="button btn btn-pnc-nav h-100 w-100" id="pnc-tab" data-toggle="tab" href="#pnc" role="tab" aria-controls="pnc" aria-selected="false" style="border-radius: 0 !important;">Previous</div>
                      </div>
                      <div class="col py-1 ml-5">
                        <span class="align-text-top"><strong>Page 2 of 2</strong></span>
                      </div>
                      <div class="col pr-5">
                         <div class="button btn btn-pnc-disabled h-100 w-100" style="border-radius: 0 !important;">Next</div>
                      </div>
                      <div class="col">
                        <div class="button btn btn-pnc-nav h-100 w-100" style="border-radius: 0 !important;">Done</div>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade show" id="cad" role="tabpanel" aria-labelledby="cad-tab">
            CAD
          </div>
          <div class="tab-pane fade show" id="text" role="tabpanel" aria-labelledby="text-tab">
            TEXT
          </div>
          <div class="tab-pane fade show" id="map" role="tabpanel" aria-labelledby="map-tab">
            MAP
          </div>
        </div>
      </div>
    </div>
    <div class="row py-2">
      <div class="col">
        <div class="button btn btn-info h-100 w-100 pt-3" style="border-radius: 0 !important; color: yellow;">IN COV</div>
      </div>
      <div class="col col-2">
        <div class="button btn btn-success h-100 w-100 pt-3" style="border-radius: 0 !important;">ON PATROL</div>
      </div>
      <div class="col">
        <div class="button btn btn-info h-100 w-100 pt-3" style="border-radius: 0 !important;">Back</div>
      </div>
      <div class="col">
        <div class="button btn btn-info h-100 w-100 pt-3" style="border-radius: 0 !important; color: yellow;">23:40</div>
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
        <div class="button btn btn-danger h-100 w-100" style="border-radius: 0 !important;">Urgent Assistance</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>