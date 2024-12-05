/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: datatables init js
*/
//buttons exmples
document.addEventListener('DOMContentLoaded', function () {
  let table = new DataTable('#ajax-datatables', {
        "ajax": 'build/json/datatable.json'
    });
});
