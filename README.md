# Project SHOP ONLINE 
## Overview
### Title: Fashion & Style
## What Does it do ?
This Website shows the products clothes with all details ,reviews and sell the products with payments and refunds.
The Website  provides Users Database with  registration  login and the logout.
There are  two charts one for each product's reviews and another chart for the orders and refunds.  
## Starter
 I started to create the Database and  Web Pages writing in the paper after I used the text file 
 to develop the text and focus different points of my Website pages.
 I created  table for each product with PhpMyAdmin. 
 I created the Authentication and CRUD 
 manage the database PhpmyAdmin to create the products,reviews ,orders  payments and refunds with Stripe Api . 
 I created the Google Charts using the database reviews orders and refunds.
 Men Pants, Skirts and Bags pages have the filter price Min and Max.
 I also used the file text: todo to add the extra features and testing.


## Features
- Index.php: 
     My Homepage shows the offers product clothes for men women and accessories.
- Categories
       I created the pages for each men and  women clothes and accessories.
       Pages: Men or Woman Pants,Men or Women Shirts,Men or women Jackets,Skirts
              Accessories: Men Glasses and Hats, Women Glasses Hats and Bags.      
- Users :
     Authentication Users with Register Login  Logout and uses password hash crypt
- Product.php:
    Show the product with all detatils reviews and add in the basket.
- Order.php
     Shows all the orders with total  checkout payment and table with all the orders with add the same order ,edit the same order and change it, delete the order.
     There is also the button to delete all the orders. 

- Last order :
    Provides the chart with oders and refunds and the table payment. 

## Small Feature
  - Box Social
        Box with social media links. Unable for the small screen and  enable for ipad  large and medium screen.      
### Tech Used
- PHP
- HTml 5
- Css3
- Bootstrap 3.4.1
     - Grid: The structure with rows and columns
     - Navbar: Navigation with Categories links
     - Table: The Order list with product detail,last order, payment.

 
- Data : 
     - MySQL 
     - PhpMYAdmin
- Javascript libraries: 
        -Jquery
        -Google Charts
     

- Payment
     - Stripe Payment and Refund
- Composer
- Stripe-PhP     
- HtAccess
   - Regular Expression PhP

# Testing
## Testing Browser
 - The Testing Browser tests  the website on the different browser and
    checks the different like the picture size  and responsive navbar and charts 
 - Google Crome:
     - All the pages respond very well and jquery library work very well. 
       The Navigation Bar works perfect.The Charts work well  
       Final Testig is good
       
 - Microsoft Edge  
     - The pages respond very well . All the buttons work well.The Navigation Bar
       has the different size but the responsive is good.The Charts work well.
       Final Testing is good.
       
 - Mozilla Firefox
     - The pages respond very well . All the buttons work well.The Navigation Bar
       has the different size but the responsive is good.The Charts work well.
       Final Testing is good.
       
 - Interner Explorer     
      - All  the pages and navbar work well  
        The charts work well. 
        Final Testing is good

 ## Testing Devices Responsive
 ### Tech Used : Blisk,Responsinator, 
   - This Testing responsive is used to test the website with
      the different devices and study the navbar reactive and the 
      table list order, last orders  , payments  ,reviews and order/refund charts responsive.
- Iphone and Smartphone
     I have the good responsive and the tables respond very well.
     I fixed the responsive tables and chart for each page. 

- Ipad
    I have the good responsive and the tables respond very well.
    I fixed the responsive tables and chart for each page.
    Payment.php : I fixed the class h1 to have more responsive for ipad mini 4, ipad 10, ipad pro 9,ipad pro 10 instead I left the standard h1 for
                    Ipad pro 12 .
- Laptop- Small Screen
      All the pages have the good responsive.
- Extra large Screen
      All the pages have the good responsive
- Iphone Landscape - Android Landscape 
      All the pages have the good responsive.
      Product.php I fixed the reviews chart. 

 ## Testing STRIPE
  - Test Card Details
      - To test the payment process, you need test card details. Use any of the following test card numbers, a valid future expiration date, and any random CVC number, 
         to test Stripe payment gateway integration in PHP.
       
      - 4242424242424242 – Visa 
      - 4000056655665556 – Visa (debit)
      - 5555555555554444 – Mastercard
      - 5200828282828210 – Mastercard (debit)
      - 378282246310005 – American Express
      - 6011111111111117 – Discover
 
 ## Testing Speed Pages               
 ### PageSpeed Tools: GTmetrix

   - This Testing tests the speed pages and optimization betweeen the Desktop
      and Mobile checking almost the pages.
   - Index
         -
          Performance : 64%;
          Structure: 86%
       
   - Pants Men
       -
        Performance : 85%;
        Structure: 92%;
   - Shirts Men
       -
        Performance : 87%;
        Structure: 87%;
   - Jackets Men
        -                            
        Performance : 86%;
        Structure: 86%
   - Women Pant
        - 
        Performance : 85%;
        Structure: 88%; 
   - Women Shitrs
        -
        Performance : 86%;
        Structure: 89%;
   - Women Jacket
       -
        Performance : 87%;
        Structure: 87%;

   - Skirts
       -
        Performance : 86%;
        Structure: 96%;
   - Accessories
       - Men Glasses 
            -
             Performance : 84%;
             Structure: 91%;   
       - Men hat 
            -
             Performance : 85%;
             Structure: 87%;
       - Women Glasses
            -
             Performance : 87%;
             Structure: 91%;
       - Women Hat
            -
             Performance : 8%;
             Structure: 88%;
       - Bags
            -
             Performance : 86%;
             Structure: 90%;
       - Registration
             -
             Performance : 89%;
             Structure: 92%;
       - Login
           -
             Performance : 89%;
             Structure: 92%;

       - Product
            -
             Performance : 85%;
             Structure: 89%;
       - Order
            -
             Performance : 88%;
             Structure: 91%;
        - Edit
             -
              Performance : 86%;
              Structure: 93%;
        - Checkout
             -
              Performance : 89%;
              Structure: 91%;
         

                       
### Deployment
  - GitHub
      - Initial Commit : Add all the files and composer.json.
      - Medium Commit:  Add the last changes
      - Final commit: The code with the last changes
      - Final : Add the Readme.md     
  - Heroku
      - Add all the files and composer.json
      - Create ClearDB MySql - Ignite Free-
      - Transfer user  password database from ClearDB MySql   on my server and add 
         on my config.php on my localhost phpMyAdmin.
      - Change my db.php with all the user password and dbClear. 
      - Final Deployment.  
