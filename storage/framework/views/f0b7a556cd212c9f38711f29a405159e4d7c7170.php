<?php $__env->startSection('content'); ?>
<div class="padL2rem flex listBox header space-between w-max bgs1">
    <div class="flex alignCenter gap1">
            <h1>ProductX</h1>
            <img class = "logo" src="../resources/imgs/box.png" alt="djjdj">
    </div>
    <div class="flex alignCenter gap1 padR5rem">
        <a href="http://localhost:8888/products/public/admin">Add</a>
        <a href="http://localhost:8888/products/public/adminList">List</a>
    </div>
</div>
<div class=" alignCenter flex col pad2rem">
    <h1 class="marT100px marB50px">List</h1>
<div class="test"></div>
    <div class = "w-max flex gap1 padB10px list-nav" id =  "adminFilter">
        <div>
            <label for="">Category</label>
            <select name="category" id = "category">
            <option value="" selected = "selected">Select Category</option>
            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="">Date</label>
            <input type="date" id = "date">
        </div>
        <div>
            <label for="">Amount</label>
            <input type="input" id = "amount">
        </div>
        <button onclick = "adminFilter()">Filter</button>
    </div>
    <div class="scrollbox-x">
        <table class = "table w-max">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th><i class="fa fa-camera-retro" aria-hidden="true"></i></th>
            <th>Added</th>
            <th>Weight</th>
            <th>Amount</th>
            <th>Avaliable</th>
            <th>Amount(WH)</th>
            <th>Color</th>
            <th>Size</th>
            <th>Shippping</th>
            <th>Category</>
            <th><i class="fa fa-eur" aria-hidden="true"></i></th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><img src="../storage/app/<?php echo e($product->img); ?>" alt=""></img></td>
            <td><?php echo e($product->timestamp); ?></td>
            <td><?php echo e($product->weight); ?></td>
            <td><?php echo e($product->amount); ?></td>
            <td><?php echo e($product->is_avaliable); ?></td>
            <td><?php echo e($product->wh_amount); ?></td>
            <td><?php echo e($product->color); ?></td>
            <td><?php echo e($product->size); ?></td>
            <td><?php echo e($product->shipping); ?></td>
            <td><?php echo e($product->category_id); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><a class ="edit" href="http://localhost:8888/products/public/edit/<?php echo e($product->id); ?>""><i class="fa fa-pencil-square" aria-hidden="true" ></i></a></td>
            <td><a class ="delete" href="http://localhost:8888/products/public/delete/<?php echo e($product->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/products/resources/views/list.blade.php ENDPATH**/ ?>