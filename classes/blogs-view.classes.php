<?php

class BlogsView extends BlogsSelect
{
    private int $off_set;
    private int $page_limit = 2;
    private array $table_data;

    public function setPageLimit(int $page_limit)
    {
        $this->page_limit = $page_limit;
    }

    public function fetchBlogData($search_parameter)
    {
       $blog_data = $this->getFilteredBlogData($search_parameter);

       foreach ($blog_data as $element_key => $element_value)
       {
            $this->table_data[$element_key] = $element_value;
       }
    }

    public function displayFetchedData($current_page = 1)
    {
        $total_pages = ceil(count($this->table_data) / $this->page_limit);      
        $_SESSION['total_pages'] = $total_pages;

        $current_page = max($current_page, 1);
        $current_page = min($current_page, $total_pages);

        $this->off_set = ($current_page - 1) * $this->page_limit;

        $selected_data = array_slice($this->table_data, $this->off_set, $this->page_limit);

        $counter = 0;
        $create_section = true;

        // Output Data
        foreach ($selected_data as $data_row)
        {
            $counter++;

            if ($create_section)
            {
                echo "<article class='blog-article'>";
                echo '<h2>' .  $data_row['title']  . '</h2>';
                echo '<p>' . 'Category: '.  $data_row['type_name'] . '</p>';
                echo '<p>' . 'Date Created: '. date_format(date_create($data_row['date_created']),"F d,Y,  g:i a") . '</p>';
                $create_section = false;
            }

            echo "<section class='blog-section'>";
            echo '<h5>' . 'Users Name: ' . $data_row['users_uid']  . '</h5>';
            echo '<p>' . 'Last update: ' . date_format(date_create($data_row['comment_time_stamp']),"F d,Y,  g:i a") . '</p>';
            echo '<blockquote>' . $data_row['comment'] . '<blockquote>';
            echo '</section>';

            if (count($selected_data) !== $counter && 
                $selected_data[$counter]['title'] !== $data_row['title'])
            {
                echo '</article>';
                $create_section = true;
            }
            else if (count($selected_data) === $counter)
            {
                echo '</article>';
            } 
        }

        // Pagination links
        $page_link = '';

        echo "<section>";
        echo "<ul class='pagination-container'>";
        
        // Show prev and first-page links. 
        if($current_page > 1)
        { 
            echo "<li class='pagination'><a href='community-form.php?page=1'> << </a></li>"; 
            echo "<li class='pagination'><a href='community-form.php?page=". ($current_page - 1) ."'> < </a></li>"; 
        } 
        
        // Show sequential links. 
        for ($i = 0; $i < $total_pages; $i++)
        { 
            $page_link .= "<li class='pagination'><a href='community-form.php?page=".($i + 1)."'>".($i + 1)."</a></li>";   
        }  

        echo $page_link; 
        
        // Show next and last-page links. 
        if($current_page < $total_pages)
        { 
            echo "<li class='pagination'><a href='community-form.php?page=". ($current_page + 1) ."'> > </a></li>"; 
            echo "<li class='pagination'><a href='community-form.php?page=". $total_pages ."'> >> </a></li>";
        }

        echo '</ul>';
        echo '</section>';
    }



}