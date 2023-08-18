# Online-store-Project3
The online-store_project folder contains Models folder, Controller folder and Views folder, following MVC 
pattern. The entire project is based on classes.

In Models folder I used classes using methods to manage the database information. 

Controllers folder contains classes using methods which creates communication between Models, Views and database. 

Views folder contains source code for displaying the online store pages, related for users such us:
1. Login page
2. Register page
3. Home page
4. Products page
5. Product details page
6. Contact us page
7. About page
8. Cart page
9. Checkout page

Functionalities for Views are placed in Views/App folder to keep the code more organized and
to use less lines.

Each product contains its details such as: image, id, name, description, price and availability. 



The user can choose the quantity of one particular product before adding to cart. 
Cart page provide the products added to cart with image, product id, product name, quantity and price.
The user can change the quantity or to delete one particular product.
Once one product is deleted or the quantity is modified, the subtotal and the total amount to pay
is updating. 

Once the user click the checkout button, it leads to check out page which return to the user
the order placed and a nice 'thank you' message. 

The cart count reset to 0(items in cart). 