@extends('admin.layout.master')
@section('style')
{{-- <style>
    fieldset {
  border-radius: 5px;
  padding: 0 20px;
  padding: 10px;
}

legend {
  background-color: #4c4c4c;
  color: #ffffff;
  padding: 5px;
  border-radius: 3px;
}

input:invalid:required {
  background-color: lightpink;
}

.container {
  display: flex;
  gap: 5px;
  justify-content: space-between;
}

.container > div {
  flex: 1 auto;
  background-color: lightgreen;
  padding: 5px;
  border-radius: 3px;
}

.input {
  border: none;
  border-radius: 4px;
  height: 25px;
  padding: 2px;
  font-size: 0.9em;
}

label {
  font-size: 0.9em;
}

#submit {
  padding: 0;
}

#submit > button {
  background-color: #ccc;
  box-shadow: 2px 2px 5px gray;
  width: 100%;
  height: 100%;
  border: none;
  cursor: pointer;
}

#submit > button:active {
  box-shadow: 1px 1px 0px gray;
  background-color: #eee;
}

#submit > button:hover {
  background-color: aliceblue;
}

.calendar {
  margin: 20px 0;
}

.calendar > * {
  margin: 10px 0;
}

h1 {
  position: relative;
  background-color: green;
  padding: 8px 30px;
  text-align: center;
  color: #fff;
  border-radius: 8px;
}

h1 .btn {
  position: absolute;
  top: 20%;
  height: 60%;
  text-shadow: 2px 2px 5px rgb(35, 35, 46);
  border: 0;
  background: none;
  font-size: 1.2em;
  line-height: 0;
  color: lightgreen;
  cursor: pointer;
  opacity: 0.5;
}

h1 .btn:active {
  text-shadow: 0 0 2px rgb(35, 35, 46);
  color: #fff;
  opacity: 1;
}

h1 .prev {
  left: 10px;
}

h1 .next {
  right: 10px;
}

.calendar ul {
  list-style-type: none;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 1px;
  padding-left: 0;
}

.calendar li:nth-child(7n) {
  color: blue;
}

.calendar li:nth-child(7n-1) {
  color: red;
}

.weekdays {
  text-align: center;
  background-color: rgba(0, 0, 0, 0.1);
  border-top: 2px solid;
  border-bottom: 2px solid;
  color: green;
  padding: 5px;
}

.days li {
  text-align: right;
  border: 1px solid green;
  background-color: rgba(0, 200, 0, 0.1);
  border-radius: 5px;
  padding: 5px 30% 5px 5px;
}

footer {
  font-size: 0.8em;
  text-decoration: underline;
  font-weight: 600;
  background-color: #7fffd4;
  text-align: center;
  padding: 4px;
}

footer:hover {
  cursor: pointer;
  text-decoration: none;
}

footer:active {
  color: red;
}

</style> --}}

@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="content-page">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-block card-stretch">
                                        <div class="card-body p-0">
                                            <div class="d-flex justify-content-between align-items-center p-3">

                                                <div class="page-wrapper">
                                                    <div class="content container-fluid">

                                                        <!-- Page Header -->
                                                        <div class="page-header">
                                                            <div class="row">

                                                            </div>
                                                        </div>
                                                        <!-- /Page Header -->

                                                        <!-- Search Filter -->

                                                        <form action="" method="GET">
                                                        <div class="row filter-row">
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-focus">
                                                                    <input type="text" placeholder="Search Driver Name"
                                                                        class="form-control floating">
                                                                    <br>
                                                                   
                                                                    <span class="btn btn-secondary"><i class="fa fa-calendar" aria-hidden="true"> &nbsp;<?php date_default_timezone_set("Asia/Kolkata");
                                                                        $today = date("F Y");
                                                                        echo $today;?></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-focus select-focus">
                                                                    <select id="select" class="select floating form-control" >
                                                                        <option>-Select Month-</option>
                                                                        <option value="January">January</option>
                                                                        <option value="February">February</option>
                                                                        <option value="February">March</option>
                                                                        <option value="February">April</option>
                                                                        <option value="February">May</option>
                                                                        <option value="February">June</option>
                                                                        <option value="February">July</option>
                                                                        <option value="February">August</option>
                                                                        <option value="February">September</option>
                                                                        <option value="February">October</option>
                                                                        <option value="February">November</option>
                                                                        <option value="February">December</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-focus select-focus">
                                                                    <select class="select floating form-control" id="year" class="">
                                                                        <option>-Select Year-</option>
                                                                       <?php  

                                                                         $cur_year = date('1990');
                                                                            for ($i=0; $i<=60; $i++) { ?>
                                                                            
                                                                       <option><?php echo $cur_year++; ?></option>
                                                                          <?php }?>

                                                                        
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a  href="" class="btn btn-primary" value="submit"> Search
                                                                </a> <a  href="" class="btn btn-danger" value="submit"> Clear
                                                                </a>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <!-- /Search Filter -->
                                               
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped">
                                                                        <?php 
                                                                        // $list=array();
                                                                        //     $month = 6;
                                                                        //     $year = 2004;

                                                                        //     for($d=1; $d<=31; $d++)
                                                                        //     {
                                                                        //         $time=mktime(12, 0, 0, $month, $d, $year);          
                                                                        //         if (date('m', $time)==$month)       
                                                                        //             $list[]=date('Y-m-d-D', $time);
                                                                        //     }
                                                                        //     echo "<pre>";
                                                                        //     print_r($list);
                                                                        //     echo "</pre>";
                                                                            ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Driver Name</th>
                                                                                <?php $list=array();
                                                                                  $month = date('m');
                                                                                  $year = date('y');

                                                                                  for($d=1; $d<=31; $d++)
                                                                                  {
                                                                                      $time=mktime(12, 0, 0, $month, $d, $year);          
                                                                                      if (date('m', $time)==$month)       
                                                                                          $list[]=date('D d', $time);
                                                                                  }

                                                                                  foreach ($list as $lis){
                                                                                      echo '<th>'.$lis.'</th>';
                                                                                          } 
                                                                                          ?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>


                                                                                    <p>Lesley Grauer</p>

                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>


                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>


                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                   <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                   <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);"
                                                                                        data-toggle="modal"
                                                                                        data-target="#attendance_info"><i
                                                                                            class="fa fa-check text-success"></i></a>
                                                                                </td>
                                                                                <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                    data-target="#attendance_info"><i
                                                                                        class="fa fa-check text-success"></i></a>
                                                                              </td>
                                                                                </td>
                                                                               
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row">
                                                       <div class="col-lg-12">
                                                        <div class="calendar">
                                                            <h1>
                                                              <button class="prev btn">&lt;</button>
                                                              <span class="month-year"></span>
                                                              <button class="next btn">&gt;</button>
                                                            </h1>
                                                            <ul class="weekdays"></ul>
                                                            <ul class="days"></ul>
                                                          </div>
                                                          <footer></footer>
                                                       </div>
                                                    </div> --}}
                                                    <!-- /Page Content -->

                                                    <!-- Attendance Modal -->
                                                    <div class="modal custom-modal fade" id="attendance_info"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Attendance Info</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="card Log-status">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">Timesheet <small
                                                                                            class="text-muted">11 Mar
                                                                                            2019</small>
                                                                                    </h5>
                                                                                    <div class="Log-det">
                                                                                        <h6>Log In at</h6>
                                                                                        <p>Wed, 11th Mar 2019 10.00 AM</p>
                                                                                    </div>
                                                                                    <div class="Log-info">
                                                                                        <div class="Log-hours">
                                                                                            <span>3.45 hrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="Log-det">
                                                                                        <h6>Log Out at</h6>
                                                                                        <p>Wed, 20th Feb 2019 9.00 PM</p>
                                                                                    </div>
                                                                                    <div class="statistics">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-6 col-6 text-center">
                                                                                                <div class="stats-box">
                                                                                                    <p>Break</p>
                                                                                                    <h6>1.21 hrs</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-md-6 col-6 text-center">
                                                                                                <div class="stats-box">
                                                                                                    <p>Overtime</p>
                                                                                                    <h6>3 hrs</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card recent-activity">
                                                                                <div class="card-body d-flex">
                                                                                    <h5 class="card-title">Activity</h5>
                                                                                    <ul class="res-activity-list">
                                                                                        <li>
                                                                                            <p class="mb-0">Log In at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                10.00 AM.
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">Log Out at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                11.00 AM.
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">Log In at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                11.15 AM.
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">Log Out at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                1.30 PM.
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">Log In at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                2.00 PM.
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">Log Out at
                                                                                            </p>
                                                                                            <p class="res-activity-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>
                                                                                                7.30 PM.
                                                                                            </p>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Attendance Modal -->

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
        </section>
    </div>
@endsection

{{-- @section('script') --}}
{{-- <script>
    const selectMonth = document.getElementById("select");
const yearInput = document.getElementById("year");
const enterBtn = document.getElementById("serachbtn");

const timeNow = document.querySelector("footer");
const month_year = document.querySelector(".month-year");
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];

// Populate month select button with options
for (let month of months) {
  const option = document.createElement('option');
  option.textContent = option.value = month;
  selectMonth.appendChild(option);
}

// Display current calendar date on page load.
let now = new Date();
createCalendar(months[now.getMonth()], now.getFullYear());

// At the click of the enter button.
enterBtn.addEventListener("click", (e) => {
  createCalendar(selectMonth.value, yearInput.value);
  e.preventDefault();
});

// Add event listener to date footer: return to today when clicked
timeNow.addEventListener("click", () => {
  now = new Date();
  createCalendar(months[now.getMonth()], now.getFullYear());
});

// Add event listener to prev and next month button

document.querySelector(".prev").addEventListener("click", () => {
  const MonthYear = month_year.textContent.split(" ");
  let month = MonthYear[0],
    year = MonthYear[1];
  let m = months.indexOf(month) - 1;

  if (m < 0) {
    year--;
    createCalendar(months[11], year);
  } else {
    createCalendar(months[m], year);
  }
});

document.querySelector(".next").addEventListener("click", () => {
  const MonthYear = month_year.textContent.split(" ");
  let month = MonthYear[0],
    year = MonthYear[1];
  let m = months.indexOf(month) + 1;

  if (m > 11) {
    year++;
    createCalendar(months[0], year);
  } else {
    createCalendar(months[m], year);
  }
});

// User input validation: disable enter btn if input invalid
yearInput.addEventListener("input", () => {
  if (yearInput.validity.rangeUnderflow || yearInput.validity.rangeOverflow) {
    yearInput.setCustomValidity("Input must be within 1582 and 2100");
    yearInput.reportValidity();
    enterBtn.disabled = true;
  } else {
    yearInput.setCustomValidity("");
    enterBtn.disabled = false;
  }
});

// Changes the time display on the red footer every second
setInterval(() => {
  now = new Date();
  timeNow.textContent = `${now.toDateString()}, ${now.toLocaleTimeString()}`;
}, 1000);

//
function createCalendar(month, year) {
  /* List out the number of days in month of year. */

  // Validates inputs entered from the browser console. Just for debugging sakes.
  if (!months.includes(month) || year < 1582 || year > 2100) {
    console.log("Error in createCalendar: Invalid input.");
    return;
  }

  // Update the values on the form
  selectMonth.value = month;
  yearInput.value = year;

  month_year.textContent = `${month} ${year}`;

  const weekdays = document.querySelector(".weekdays");
  weekdays.innerHTML = "";
  for (let i of ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"]) {
    const weekday = document.createElement("li");
    weekday.textContent = i;
    weekdays.appendChild(weekday);
  }

  let countdays = 0,
    daysOfMonth,
    flag = false;
  // This loop counts the days from 1900 up to the month in the given year
  for (let yyyy = 1; yyyy <= year; yyyy++) {
    for (let mm = 0; mm < 12; mm++) {
      if (mm === 1) {
        // February
        if ((yyyy % 4 === 0 && yyyy % 100 !== 0) || yyyy % 400 === 0) {
          // Leap year
          daysOfMonth = 29;
        } else {
          // other year
          daysOfMonth = 28;
        }
      } else if ([8, 3, 5, 10].includes(mm)) {
        daysOfMonth = 30;
      } else {
        daysOfMonth = 31;
      }
      for (let dd = 1; dd <= daysOfMonth; dd++) {
        countdays++;
      }
      if (yyyy === Number(year) && mm === months.indexOf(month)) {
        flag = true;
        break;
      }
    }
    if (flag) break;
  }

  const days = document.querySelector(".days");
  days.innerHTML = "";
  // Fill blank days of month
  for (let i = 1; i <= (countdays - daysOfMonth) % 7; i++) {
    const day = document.createElement("li");
    day.textContent = "";
    day.style.backgroundColor = "white";
    day.style.borderColor = "lightgreen";
    days.appendChild(day);
  }
  // Fill numbered days of month
  for (let i = 1; i <= daysOfMonth; i++) {
    const day = document.createElement("li");
    day.textContent = i.toString();
    days.appendChild(day);
    if (
      Number(year) === now.getFullYear() &&
      month === months[now.getMonth()] &&
      i === now.getDate()
    ) {
      day.style.backgroundColor = "#7FFFD4";
      day.style.boxShadow = "2px 2px 5px gray";
      day.style.border = "0";
    }
  }

  console.log("All's good with createCalendar :)");
}

    </script> --}}
{{-- @endsection --}}
