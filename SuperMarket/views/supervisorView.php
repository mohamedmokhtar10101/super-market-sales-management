 <h2 class="sectionTitle">View Edit and Delete items</h2>
          <div id="displayer"> 
              <span class="close">×</span>
              <img id="displayerContent"  style="margin: auto;display: block;width: 80%;max-width:700px;z-index:9999999">
              <div id="disItemsWrapper">
                </div>  
          </div>
          <div id="confirmDeleteDisplayer"> 
                    <span class="close">×</span>
                    <div id="confirmDeleteWrapper">
                     <h2 class="sectionTitle" style="color:white;margin:20px 0;font-size: 30px;;">Are you sure to Delete the item</h2>    
                     <a id="confirmYes" href="" class="btn btn-primary confimAction">Yes</a>  
                     <a id="confirmNO" class="btn btn-primary confimAction">NO</a>

                   </div>  


           </div>
        <div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,6,[3,8,9,10,11],[0,2,4,5,6,7],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder=''" onblur="this.placeholder='filter results'" ></div>
            <div class="tableParent">    
            <table id="itemsTable" class=" table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="success">
                            <th scope="col">ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">total Price</th>
                            <th scope="col">Actions</th>

                        </tr>

                    </thead>
                    <tfoot>
                        <tr class="success">

                            <th scope="row">Total # orders</th>
                 
                            <td colspan="3"></td>





                        </tr>
                    </tfoot>
                    <tbody>
                     <tr>
                            <td></td>
                             <td></td>
                            <td></td>
            
                            <td>
                                <a title ='delete this item' class='action' id='deleteAction' style='cursor:pointer' data-id='' onclick='displayConfirmModal(event,"none")'><img src='delete.png'/></a>
                                <a title='edit this item' class='action' id='editAction' href=''><img src='edit.png'></a>

                            </td>
                     </tr>

                    </tbody>

                </table>    


    </div>