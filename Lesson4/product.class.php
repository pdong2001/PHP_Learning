<?php
class Product
{
    public string $id = '';
    public string $name = '';
    public int $quantity = 1;
    public string $imagePath = '';
    static function parse_str(string $value): Product
    {
        $data = explode('#', $value);
        $product = new Product;
        if (isset($data)) {
            $product->id = $data[0];
            $product->name = $data[1];
            $product->quantity = isset($data[2]) ? $data[2] : 0;
            $product->imagePath = isset($data[3]) ? $data[3] : '';
        }
        return $product;
    }
    public function toTableRow(bool $addBtn = true): string
    {
        return "<td>{$this->id}</td><td>{$this->name}</td><td>{$this->quantity}</td><td><img width='100' height='100' src={$this->imagePath}/></td>" . '<td style="width:15rem;"><form method="post" class="d-inline-table" action=""><input type="hidden" value="' . $this->id . '" name="' . ($addBtn ? 'product_id' : 'd_product_id') . '"><button type="submit" class="btn btn-outline-primary">' . ($addBtn ? "Thêm vào giỏ hàng" : "Xóa khỏi giỏ hàng") . '</button></form></td>';
    }
}
?>