<?php
include 'dp.php';

$sql = "SELECT * FROM expenses ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>$" . number_format($row['amount'], 2) . "</td>
                <td>" . htmlspecialchars($row['category']) . "</td>
                <td>" . $row['date'] . "</td>
                <td><a href='delete_expense.php?id=" . $row['id'] . "' onclick=\"return confirm('Delete this expense?')\">Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No expenses found.</p>";
}
?>
