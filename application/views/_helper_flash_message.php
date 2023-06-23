<?php
if ($this->session->flashdata('msg_danger')) {
  echo "<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>" . $this->session->flashdata('msg_danger') . "</div>";
} else if ($this->session->flashdata('msg_success')) {
  echo "<div class='alert alert-success alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>" . $this->session->flashdata('msg_success') . "</div>";
} else if ($this->session->flashdata('msg_info')) {
  echo "<div class='alert alert-info alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>" . $this->session->flashdata('msg_info') . "</div>";
}
