<?php 
namespace App;

class Pagination
{
  public $data;
  public $currentPage;
  public $shownRecordsAmount;
  public $pageRecords;
  public $count;
  public $result;

  public function __construct($data, $currentPage, $shownRecordsAmount)
  {
    $this->data = $data;
    $this->currentPage = $currentPage;
    $this->shownRecordsAmount = $shownRecordsAmount;
  }

  public function result()
  {
    $this->pageRecords = array_chunk($this->data, $this->shownRecordsAmount);
    $this->count = count($this->pageRecords);

    if ($this->count > 0) {
      $this->result = $this->pageRecords[$this->currentPage - 1];
      return $this->result;
    }
    else {
      return [];
    }
  }

  public function navigator()
  {
    $backward = $this->currentPage == 1 ? "#" : "?page=" . ($this->currentPage - 1);
    $forward = $this->currentPage == $this->count ? "#" : "?page=" . ($this->currentPage + 1);

    print "<div class='pagination'>";
    print "<a href='$backward'>&laquo;</a>";
    for ($i = 1; $i <= $this->count; $i++) {
      if ($i == $this->currentPage)
        echo "<a href='#' class='active'>".$i."</a>";
      else
        echo "<a href='?page=".$i."'>".$i."</a>";
    }
    print "<a href='$forward'>&raquo;</a>";
    print "</div>";
  }
}

?>