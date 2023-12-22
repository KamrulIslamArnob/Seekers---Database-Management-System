<?php

require_once 'DBConnection.php';

class CRUD extends DBConnection
{
    private $tableName;

    public function __construct($tableName = '')
    {
        parent::__construct();
        $this->tableName = $tableName;
    }

    public function getAllRows()
    {
        $query = "SELECT * FROM $this->tableName";
        $result = $this->conn->query($query);

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getRowById($userId)
    {
        $userId = $this->conn->real_escape_string($userId);


        $sql = " SELECT
        u.id,
        u.name,
        u.user_name,
        u.email,
        u.password,
        u.role,
        u.status,
        u.address,
        u.Map_location,
        u.Facebook,
        u.Github,
        u.Linkedin,
        u.Whatsapp,
        u.profile_picture
    FROM
        users u
    WHERE
        u.id = $userId
        ";

        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
    }

    public function addRow($data)
    {
        // Ensure data is an associative array
        if (!is_array($data)) {
            return false;
        }

        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_map([$this->conn, 'real_escape_string'], $data)) . "'";

        $query = "INSERT INTO $this->tableName ($columns) VALUES ($values)";
        return $this->conn->query($query);
    }

    public function updateRow($rowId, $data)
    {
        // Ensure data is an associative array
        if (!is_array($data)) {
            return false;
        }

        $updateValues = [];
        foreach ($data as $key => $value) {
            // Skip empty values
            if (!empty($value)) {
                $updateValues[] = "$key = '" . $this->conn->real_escape_string($value) . "'";
            }
        }

        $setClause = implode(', ', $updateValues);
        $rowId = $this->conn->real_escape_string($rowId);


        if (!empty($setClause)) {
            $query = "UPDATE $this->tableName SET $setClause WHERE id = '$rowId'";
            return $this->conn->query($query);
        } else {
            // No non-empty fields to update
            return false;
        }
    }

    


    public function deleteRow($rowId)
    {
        $rowId = $this->conn->real_escape_string($rowId);
        $query = "DELETE FROM $this->tableName WHERE id = '$rowId'";
        return $this->conn->query($query);
    }

    public function getUserWithDetails($userId)
    {
        $userId = $this->conn->real_escape_string($userId);

        // Replace this with your custom join query
        $sql = "SELECT
        u.id,
        u.name,
        u.user_name,
        u.email,
        u.email_verified_at,
        u.password,
        u.role,
        u.status,
        u.about,
        u.remember_token,
        u.created_at,
        u.updated_at,
        u.DOB,
        u.LastLogin,
        u.address,
        u.profile_picture,
        u.designation,
        u.phone,
        u.tagline,
        u.cv,
        u.Nationality,
        u.Freelance,
        u.map_location,
        u.Facebook,
        u.Github,
        u.Linkedin,
        u.Whatsapp,
        GROUP_CONCAT(DISTINCT s.skill_name) AS skills,
        GROUP_CONCAT(DISTINCT ls.language_name) AS languages,
        GROUP_CONCAT(DISTINCT p.project_id) AS project_ids,
        GROUP_CONCAT(DISTINCT p.project_name) AS project_names,
        GROUP_CONCAT(DISTINCT p.description) AS project_descriptions,
        GROUP_CONCAT(DISTINCT p.project_link) AS project_links,
        
        GROUP_CONCAT(DISTINCT e.experience_id) AS experience_ids,
        GROUP_CONCAT(DISTINCT e.job_title) AS job_titles,
        GROUP_CONCAT(DISTINCT e.company) AS companies,
        GROUP_CONCAT(DISTINCT e.start_date) AS experience_start_dates,
        GROUP_CONCAT(DISTINCT e.end_date) AS experience_end_dates,
        GROUP_CONCAT(DISTINCT e.description) AS experience_descriptions,
        GROUP_CONCAT(DISTINCT edu.edu_id) AS education_ids,
        GROUP_CONCAT(DISTINCT edu.name) AS education_names,
        GROUP_CONCAT(DISTINCT edu.degree) AS education_degrees,
        GROUP_CONCAT(DISTINCT edu.city) AS education_cities,
        GROUP_CONCAT(DISTINCT edu.start_date) AS education_start_dates,
        GROUP_CONCAT(DISTINCT edu.end_date) AS education_end_dates,
        GROUP_CONCAT(DISTINCT edu.description) AS education_descriptions
    FROM
        users u
    LEFT JOIN skills s ON u.id = s.skill_id
    LEFT JOIN projects p ON u.id = p.id
    LEFT JOIN language_skills ls ON u.id = ls.id
    LEFT JOIN experience e ON u.id = e.id
    LEFT JOIN education edu ON u.id = edu.user_id
    WHERE
        u.id = $userId
    GROUP BY
        u.id, u.name, u.user_name, u.about, u.email, u.email_verified_at, u.password,
        u.role, u.status, u.remember_token, u.created_at, u.updated_at,
        u.DOB, u.LastLogin, u.address, u.profile_picture, u.designation, u.phone,
        u.tagline, u.cv, u.Nationality, u.Freelance, u.map_location,
        u.Facebook, u.Github, u.Linkedin, u.Whatsapp
    ";

        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
    }


    // resume details
    public function getAchievementsByResumeId($resumeId)
{
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                achievement_id,
                resume_id,
                Title,
                Description
            FROM
                resume_achievements
            WHERE
                resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $achievements = $result->fetch_all(MYSQLI_ASSOC);

    return $achievements;
}

public function getEducationByResumeId($resumeId)
{
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                education_id,
                resume_id,
                school,
                degree,
                city,
                start_date AS education_start_date,
                end_date AS education_end_date,
                description AS education_description
            FROM
                resume_education
            WHERE
                resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $education = $result->fetch_all(MYSQLI_ASSOC);

    return $education;
}

public function getExperienceByResumeId($resumeId)
{
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                experience_id,
                resume_id,
                title AS experience_title,
                company AS experience_company,
                location AS experience_location,
                start_date AS experience_start_date,
                end_date AS experience_end_date,
                description AS experience_description
            FROM
                resume_experience
            WHERE
                resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $experience = $result->fetch_all(MYSQLI_ASSOC);

    return $experience;
}


public function getProjectsByResumeId($resumeId)
{
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                project_id,
                resume_id,
                Title AS project_title,
                link AS project_link,
                Description AS project_description
            FROM
                resume_project
            WHERE
                resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $projects = $result->fetch_all(MYSQLI_ASSOC);

    return $projects;
}

public function getSkillsByResumeId($resumeId)
{
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                skill_id,
                resume_id,
                skill_name
            FROM
                resume_skills
            WHERE
                resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $skills = $result->fetch_all(MYSQLI_ASSOC);

    return $skills;
}


public function getAboutByResumeId($userId, $resumeId)
{
    $userId = $this->conn->real_escape_string($userId);
    $resumeId = $this->conn->real_escape_string($resumeId);

    $sql = "SELECT
                user_id,
                resume_id,
                First_name as fn,
                Middle_name,
                last_name,
                contact_information,
                summary,
                designation,
                img,
                address,
                email

            FROM
                user_resumes
            WHERE
                user_id = $userId AND resume_id = $resumeId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $about = $result->fetch_assoc();

    return $about;
}





public function getAllResumeshow($userId)
{
    $userId = $this->conn->real_escape_string($userId);

    $sql = "SELECT resume_id, user_id, resume_title FROM user_resumes WHERE user_id = $userId";

    $result = $this->conn->query($sql);

    // Check if the query was successful
    if (!$result) {
        // Handle the error, for example, return an empty array
        return [];
    }

    // Fetch all rows as an associative array
    $resumes = $result->fetch_all(MYSQLI_ASSOC);

    return $resumes;
}





}
