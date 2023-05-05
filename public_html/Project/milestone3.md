<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Tejal Patel (tp7)</td></tr>
<tr><td> <em>Generated: </em> 5/5/2023 3:48:38 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-3-shop-project/grade/tp7" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Orders will be able to be recorded </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707834-bf5a5b13-ec36-4597-9741-aa830c195be2.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236538503-747e7f99-8f8c-4e19-8ff6-59d3d6ef01e8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of order&#39;s table with data in it<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236538689-0ff0857d-9f11-4b08-b6db-8d4b14466fd2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of order items table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236539171-e30dd6bd-b1ea-4b3d-8a5a-0e7c8d68cd96.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of the purchase<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot showing the items pending purchase from Heroku</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236539815-7f4a3cf7-cd07-4003-a659-01a4a71a77fb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the order process validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a screenshot showing the Order Process validations from the UI (Heroku)</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>for the purchase it gets the items stock, items name, cart item _id,<br>items cost,desired quantity from cart, unit price from cart and&nbsp; combines the data<br>from items table to cart item id to a user&#39;s cart.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tejalpatel7/IT202-008/pull/59">https://github.com/tejalpatel7/IT202-008/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tp7-prod.herokuapp.com/Project/OrderConfirmation.php?id=20">https://it202-tp7-prod.herokuapp.com/Project/OrderConfirmation.php?id=20</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236542469-1fe35c36-79a7-4d8a-b906-0f1731109f1e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing screenshot of order confirmation page with details and thank you message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>Once user confirms their order, it will take them to order confirmation page<br>where it will fetch name, description from items, desired quantity from order items<br>table, address, payment method and join that to a order id. Then it<br>will display the product information such as name, price, description, quantity, payment method,<br>address and total cost. At the bottom the will also get a thank<br>you message<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tejalpatel7/IT202-008/pull/59">https://github.com/tejalpatel7/IT202-008/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tp7-prod.herokuapp.com/Project/OrderConfirmation.php?id=20">https://it202-tp7-prod.herokuapp.com/Project/OrderConfirmation.php?id=20</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236543609-c5b4852a-ddab-4281-9d1f-82caa6b40431.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of user purchase history<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236543839-5acda40d-aed2-4d9f-8c9b-627a1e145130.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of user&#39;s purchase history<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>Once the user purchase the items in the cart, it will take them<br>to order history page and then they can click on more info to<br>see the full details of what was bought.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tejalpatel7/IT202-008/pull/59">https://github.com/tejalpatel7/IT202-008/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tp7-prod.herokuapp.com/Project/purchase_history.php">https://it202-tp7-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236551397-05518287-b6cc-48a7-a293-0894b381807a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing purchase history from multiple user&#39;s on admin page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236553154-c59e288e-6fde-4f14-96f1-f0d9dc3d1adb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing detailed information<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>Once the user purchased the item, owner is able to see it in<br>the customer&#39;s purchase history and they can look at more details about that<br>order.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tejalpatel7/IT202-008/pull/59">https://github.com/tejalpatel7/IT202-008/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tp7-dev.herokuapp.com/Project/admin/orderHistoryUsers.php">https://it202-tp7-dev.herokuapp.com/Project/admin/orderHistoryUsers.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart page showing the button to place an order</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236553603-ac76ed1f-a026-49ac-bc91-38b9818f578d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshot of place order button on cart page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236555542-09fdc4da-e3e7-43f0-97a4-b10ebb6e7fca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing project board<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98568164/236555640-0f3bffde-1ea1-4301-a4ad-a3cc325d8266.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing project board part 2<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-3-shop-project/grade/tp7" target="_blank">Grading</a></td></tr></table>