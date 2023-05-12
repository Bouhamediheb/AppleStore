$(document).ready(function() {
    // Add event listeners to each menu item
    $(document).on('click', '.menu-item.active', function() {
      // Update the content on the right side of the page
      $('#content').load('bannerDash.php');

    });
  
    $(document).on('click', '.menu-item:nth-child(6)', function() {
      // Update the content on the right side of the page
      $('#content').load('listeProdDash.php');

    });

    $(document).on('click', '.menu-item:nth-child(7)', function() {
      // Update the content on the right side of the page
      $('#content').load('ajouterunProduit.php');

    });

    $(document).on('click', '.menu-item:nth-child(8)', function() {
      // Update the content on the right side of the page
      $('#content').load('listeProdDash.php');

    });

    $(document).on('click', '.menu-item:nth-child(9)', function() {
      // Update the content on the right side of the page
      $('#content').load('supprProduit.php');

    });


    
  
   
  });