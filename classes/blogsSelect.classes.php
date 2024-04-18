<?php

class BlogsSelect extends Dbh
{
    private $title;
    private $category;
    private $date;
    private $user_login_name;
    private $comment_id;
    private const QUERY_SELECT =
        "SELECT 
            forum.title,
            forum.date_created,
            categories.type_name,
            users.users_uid,
            users_forum_comment.users_forum_comment_id,
            users_forum_comment.comment_time_stamp,
            users_forum_comment.comment
        FROM users 
        INNER JOIN  users_forum_comment  ON users.user_id = users_forum_comment.user_id
        INNER JOIN  forum                ON users_forum_comment.forum_id = forum.forum_id
        INNER JOIN  categories           ON forum.category_id = categories.category_id";


    protected function getDataViews(int $query_number) 
    {
       try
       {
           $statement_exec = $this->getSelectQuery($query_number);
           $statement_exec->execute();
       } 
       catch (PDOException)
       {
            header("location: ../community-form.php?error=stmtselectFailed");
            die();
       }
    }

    private function getSelectQuery($query_type)
    {
        $statement_object = '';

        switch ($query_type) 
        {
            case 0:
                $statement_object = $this->getDefaultQuery();
                break;
            case 1:
                $statement_object = $this->getDefaultDateQuery();
                break;
            case 2:
                $statement_object = $this->getUserDefaultTimeQuery();
                break;
            case 3:
                $statement_object = $this->getUserDateQuery();
                break;
            case 4:
                $statement_object = $this->getTitleDefaultTimeQuery();
                break;
            case 5:
                $statement_object = $this->getTitleDateQuery();
                break;
            case 6:
                $statement_object = $this->getSingleCommentQuery();
                break;
        }

        return $statement_object;
    }

    private function getDefaultQuery()
    {
        $query_statement = 
            self::QUERY_SELECT . " " .
            "WHERE users_forum_comment.comment IS NOT NULL
             ORDER BY forum.title ASC, users_forum_comment.comment_time_stamp ASC 
             LIMIT 100;";

        // A PDO : : Statement is prepared from the query
         return $statement = $this->connect()->prepare($query_statement);
    }

    private function getDefaultDateQuery()
    {
        $query_statement =
            self::QUERY_SELECT . 
            " " . 
            "WHERE date_and_time = :selected_date ORDER BY date_and_time DESC LIMIT 100";

        $statement = $this->connect()->prepare($query_statement);

        return $statement->bindValue(':selected_date', $this->date);
    }

    private function getUserDefaultTimeQuery()
    { 
        $query_statement = 
            self::QUERY_SELECT .
             " " .
            "WHERE user_name = :user_name
             ORDER BY date_and_time DESC
             LIMIT 100";


        $statement = $this->connect()->prepare($query_statement);

        return $statement->bindValue(':user_name', $this->user_login_name);
    }

    private function getUserDateQuery()
    {
        $query_statement = 
            self::QUERY_SELECT . 
            " " . 
            "WHERE user_name = :user_name AND date_and_time = :date_and_time
            ORDER BY user_name ASC 
            LIMIT 100";
           
        $statement = $this->connect()->prepare($query_statement);

        $statement->bindValue(':user_name', $this->user_login_name);
        $statement->bindValue(':date_and_time', $this->date);

        return $statement;
    }

    private function getTitleDefaultTimeQuery()
    {
        
        $query_statement = 
            self::QUERY_SELECT . " " .
            "WHERE LOWER(title) LIKE LOWER(:title)
             ORDER BY users_forum_comment.comment_time_stamp ASC
             LIMIT 100;";

        $statement = $this->connect()->prepare($query_statement);

        $statement->bindValue(':title', strtolower($this->title));

        return $statement;
    }

    private function getCategoryDefaultTimeQuery()
    {
        $query_statement = 
            self::QUERY_SELECT . 
            " " . 
            "WHERE LOWER(type_name) = LOWER(:type_name)
            ORDER BY date_and_time DESC 
            LIMIT 100";

        $statement = $this->connect()->prepare($query_statement);

        $statement->bindValue(':type_name', $this->category);

        return $statement;
    }

    private function getTitleDateQuery()
    {
        $query_statement = 
            self::QUERY_SELECT . 
            " " . 
            "WHERE title = :title AND date_and_time = :date_and_time 
            ORDER BY title ASC
            LIMIT  100";

        $statement = $this->connect()->prepare($query_statement);

        $statement->bindValue(':title', $this->title);
        $statement->bindValue(':date_and_time', $this->date);

        return $query_statement;
    }

    private function getSingleCommentQuery()
    {
        $query_statement = 
            self::QUERY_SELECT . 
            " " . 
            "WHERE users__forum_comment.users__forum_comment_id = :comment_id
            LIMIT  1";

            $statement = $this->connect()->prepare($query_statement);
            $statement->bindValue(':comment_id', $this->comment_id);

            return $statement;
    }

    protected function getFilteredBlogData($blog_search)
    {
        $fetched_search_data = null;

        $found_data_flag = true;

        try
        {


            if ($this->searchForumTable($blog_search)->columnCount() >= 1)
            {
                $this->title = $blog_search;
                $fetched_search_data = $this->getDefaultQuery();

                $found_data_flag = false;
            }

            if ($found_data_flag)
            {
                if ($this->searchCategorieTable($blog_search)->rowCount() >= 1) 
                {
                    $this->category = $blog_search;
                    $fetched_search_data = $this->getCategoryDefaultTimeQuery();
    
                    $found_data_flag = false;
                }

            }

            if ($found_data_flag)
            {

            }


            $fetched_search_data->execute();
        
            // Fetch all matching rows
           return $fetched_search_data->fetchAll(PDO::FETCH_ASSOC);
        
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    private function searchForumTable($search_value)
    {
        $query = 
            "SELECT forum_id, title
             FROM forum
             WHERE LOWER(title) LIKE  LOWER(:title)";

        // Prepare and execute the query
        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':title', $search_value);
        $statement->execute();

        return $statement;
    }

    private function searchCategorieTable($search_value)
    {
        $query = 
            "SELECT category_id, type_name 
             FROM categories
             WHERE LOWER(type_name) LIKE CONCAT('%', LOWER(:type_name), '%')";

        // Prepare and execute the query
        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':type_name', $search_value);
        $statement->execute();

        return $statement;
    }
}
