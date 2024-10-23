<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>
<body>

<?php include'sidebar.php'; ?>

<div class="wrapper">
    <div class="accounts-table">
        <div class="header">
            <h1>Accounts</h1>
            <div class="filter-table-row">
                <p>Sort by: </p>
                <div class="sort-accounts">
                    <select name="user_type" id="user_type">
                    <option value="all" selected>All</option>
                    <option value="name">Name</option>
                    <option value="date">Date</option>
                    </select>
                </div>
                <p>Filter by: </p>
                <div class="filter-accounts">
                    <select name="user_type" id="user_type">
                    <option value="all" selected>All</option>    
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="accounts-table-container">
            <table id="default-table">
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Created</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><div class="user-info"><img src="../assets/DE LEON.jpg" alt="profile">Karl De Leon</div></td>
                    <td>October 23 2024 - 12:15 PM</td>
                    <td>deleon@gmail.com</td>
                    <td>Seller</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><div class="user-info"><img src="../assets/CAHILIG.jpg" alt="profile">Efren Dave Cahilig</div></td>
                    <td>June 23 2024 - 2:15 AM</td>
                    <td>cahilig@gmail.com</td>
                    <td>Customer</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><div class="user-info"><img src="../assets/ELMEDO.jpg" alt="profile">Raffy Elmedo</div></td>
                    <td>November 1 2024 - 12:00 PM</td>
                    <td>elmedo@gmail.com</td>
                    <td>Seller</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><div class="user-info"><img src="../assets/AMBINOC.png" alt="profile">Ahmad Ambinoc</div></td>
                    <td>July 12 2024 - 8:18 PM</td>
                    <td>ambinoc@gmail.com</td>
                    <td>Customer</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><div class="user-info"><img src="../assets/MODELO.jpg" alt="profile">Hanna Camille Modelo</div></td>
                    <td>April 10 2024 - 7:18 PM</td>
                    <td>modelo@gmail.com</td>
                    <td>Seller</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><div class="user-info"><img src="../assets/CABLAYAN.JPG" alt="profile">Coleen Cablayan</div></td>
                    <td>March 13 2024 - 6:18 PM</td>
                    <td>cablyan@gmail.com</td>
                    <td>Seller</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><div class="user-info"><img src="../assets/DIESTA.png" alt="profile">Francess Diesta</div></td>
                    <td>February 12 2024 - 8:10 AM</td>
                    <td>diesta@gmail.com</td>
                    <td>Customer</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><div class="user-info"><img src="../assets/SIMON 101.jfif" alt="profile">Ysa Mae Simon</div></td>
                    <td>December 12 2024 - 10:18 PM</td>
                    <td>simon@gmail.com</td>
                    <td>Seller</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><div class="user-info"><img src="../assets/GUERRERO.jpg" alt="profile">Cristel Guerrero</div></td>
                    <td>June 10 2024 - 8:10 PM</td>
                    <td>guerrero@gmail.com</td>
                    <td>Customer</td>
                    <td class="table-btn">
                        <ul>
                            <li><i class="fa-solid fa-ban"></i> <span class="tooltip">Ban</span></li>
                            <li><i class="fa-solid fa-hourglass"> <span class="tooltip">Suspend</span></i></li>
                            <li><i class="fa-solid fa-trash"></i> <span class="tooltip">Remove</span></li>
                        </ul> 
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
function toggleMenu(event) {
    const menu = event.target.nextElementSibling; // Get the next sibling (the popup-menu)
    
        // Toggle the display of the menu
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
        
        // Close the menu if clicked outside
        document.addEventListener("click", function(e) {
            if (!menu.contains(e.target) && e.target !== event.target) {
                menu.style.display = "none";
            }
        });
    }
    </script>

</body>
</html>