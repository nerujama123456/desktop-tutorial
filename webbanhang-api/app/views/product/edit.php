<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h2>Sửa sản phẩm</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li>
                                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data"
                onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control"
                        required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01"
                        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <!-- Category -->
                <div class="form-group mb-4">
                    <label for="category_id" class="form-label">
                        <i class="fas fa-box"></i> Danh mục:
                    </label>
                    <select id="category_id" name="category_id" class="form-select form-select-lg" required>
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                    <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                    <?php if ($product->image): ?>
                        <img src="/<?php echo $product->image; ?>" alt="Product Image" class="img-thumbnail mt-2"
                            style="max-width: 150px;">
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="/webbanhang/product" class="btn btn-secondary ml-2">Quay lại danh sách sản phẩm</a>
            </form>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>