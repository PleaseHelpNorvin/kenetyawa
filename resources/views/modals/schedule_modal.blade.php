<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Open Modal
</button>

<div class="modal" id="myModal" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="inputState">Faculty</label>
                  <select id="inputState" class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="inputTitle">Title</label>
                  <input type="text" class="form-control" id="inputTitle" placeholder="">
              </div>
              <div class="form-group">
                  <label for="inputScheduleType">Schedule Type</label>
                  <input type="text" class="form-control" id="inputScheduleType" placeholder="">
              </div>
              <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <input type="text" class="form-control" id="inputDescription" placeholder="">
              </div>
              <div class="form-group">
                  <label for="inputRoomLocation">Room Location</label>
                  <input type="text" class="form-control" id="inputRoomLocation" placeholder="">
              </div>
              <div class="form-group">
                  <label for="inputDaysOfWeek">Days of week</label>
                  <input type="text" class="form-control" id="inputDaysOfWeek" placeholder="">
              </div>
              <div class="form-group">
                  <label for="inputMonthFrom">Month From</label>
                  <input type="date" class="form-control" id="inputMonthFrom">
              </div>
              <div class="form-group">
                  <label for="inputMonthto">Month to</label>
                  <input type="date" class="form-control" id="inputMonthTo">
              </div>
              <div class="form-group">
                  <label for="inputMonthto">Time From</label>
                  <input type="time" class="form-control" id="inputTimeFrom">
              </div>
              <div class="form-group">
                  <label for="inputMonthto">Time to</label>
                  <input type="time" class = "form-control" id="inputTimeTo">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
          </div>
      </div>
  </div>
</div>
