/******w**************
    
    Assignment 4 Javascript
    Name: Eunice Perez
    Date: February 12, 2023
    Description:

*********************/


async function load() {
    try {
      const response = await fetch('https://data.winnipeg.ca/resource/tx3d-pfxq.json');
      const data = await response.json();
      createHTML(data);
    } catch (error) {
      console.error(error);
    }
  }
  
  /*
      createHTML function
      Using your chosen dataset, create  HTML elements 
      and add them to the provided HTML
  */
  
  function createHTML(data) {
    // Declaring variables
    const main = document.getElementById("wrapper");
    const h1 = document.createElement("h1");
    const table = document.createElement("table");
    const tableHead = document.createElement("thead");
    const tableHeadRow = document.createElement("tr");
    const tableBody = document.createElement("tbody");
  
    // Assign values
    h1.innerHTML = "Results";
    main.appendChild(h1);
    main.appendChild(table);
    table.appendChild(tableHead);
    tableHead.appendChild(tableHeadRow);
    table.appendChild(tableBody);
  
    // Add table headers
    const headers = ["park_id", "park_name", "location_description", "park_category", "district", "neighbourhood"];
    headers.forEach(header => {
      const th = document.createElement("th");
      th.innerHTML = header;
      tableHeadRow.appendChild(th);
    });
  
    // Add table rows
    data.forEach(item => {
      const tableRow = document.createElement("tr");
      tableBody.appendChild(tableRow);
      const values = [item.park_id, item.park_name, item.location_description, item.park_category, item.district, item.neighbourhood];
      values.forEach(value => {
        const td = document.createElement("td");
        td.innerHTML = value;
        tableRow.appendChild(td);
      });
    });
  }
  
  // Adds an event listener to execute the load method when the page has finished loading
  document.addEventListener("DOMContentLoaded", load);
  
























// fin test

/*
    Load function
    Using the fetch API, get your chosen dataset from the Dog API

 */

// function load() {

//     fetch('https://data.winnipeg.ca/resource/tx3d-pfxq.json')            
//         .then(result => {
//             return result.json();
//         })
//         .then(data => {
//             createHTML(data);
//         });

// }

/*
    createHTML function
    Using your chosen dataset, create  HTML elements 
    and add them to the provided HTML
*/

// function createHTML(data) {

//     // Declaring variables
//     let main = document.getElementById("wrapper");  
//     let h1 = document.createElement("h1");
//     let h2 = document.createElement("h2");
//     let table = document.createElement("table");
//     let th = document.createElement("th");
//     let tr = document.createElement("tr");
//     let td = document.createElement("td");

//     // Assign values
//     h1.innerHTML = "Results";
//     main.appendChild(h1); 	
//     main.appendChild(th);
//     main.appendChild(tr); 
//     main.appendChild(td); 
            
// }


// //adds an event listener to execute onLoad method when page finished loading
// document.addEventListener("DOMContentLoaded", load);









// const form = document.getElementById("search-form");
// const resultsContainer = document.getElementById("search-results");

// form.addEventListener("submit", function(event) {
//   event.preventDefault();
//   const neighbourhood = document.getElementById("neighbourhood").value;

//   const xhr = new XMLHttpRequest();
//   xhr.open("GET", `https://data.winnipeg.ca/resource/tx3d-pfxq.json?neighbourhood=${neighbourhood}`);
//   xhr.onload = function() {
//     if (xhr.status === 200) {
//       const data = JSON.parse(xhr.responseText);
//       let results = "";
//       data.forEach(function(item) {
//         results += `<p>${item.neighbourhood}</p>`;
//       });
//       resultsContainer.innerHTML = results;
//     } else {
//       console.error(xhr.statusText);
//     }
//   };
//   xhr.send();
// });
