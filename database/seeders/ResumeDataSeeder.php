<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class ResumeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Profile
        Profile::create([
            'name' => 'Raven Alvarez',
            'title' => 'Full Stack Software Developer',
            'email' => 'alvarezrvn@gmail.com',
            'phone' => '575-571-0007',
            'location' => 'Goodyear, Arizona, United States',
            'linkedin' => 'https://www.linkedin.com/in/alvarezrvn/',
            'github' => 'https://github.com/alvarezrvn',
            'summary' => 'Mid-level Software Developer with 4+ years of experience designing, developing, and maintaining full-stack web applications. Strong expertise in Laravel (PHP) and modern JavaScript frameworks including Vue 3. Proven track record of owning feature/projects end to end from requirements gathering to training and support. Experienced in building scalable internal tools, integrating databases, automating business processes, and collaborating with cross-functional teams.',
        ]);

        // Add Work Experience
        Experience::create([
            'company' => 'Mid-States Distribution, LLC',
            'position' => 'Full Stack Software Developer (Intermediate)',
            'location' => 'Fort Worth, TX',
            'start_date' => '2022-04-01',
            'current' => true,
            'description' => "• Develop and maintain full-stack web applications using Laravel and Vue 3 for internal business tools and portals\n• Maintain and enhance a large-scale tradeshow portal supporting exhibitor management, attendee registration, and real-time data synchronization replacing and modernizing a legacy system\n• Implement secure CRUD operations, role-based access control, employee SSO, and advanced search and filtering features. This improved authentication and security across the app\n• Designed and optimize reporting systems with data aggregation and export functionality (PDF and Excel)\n• Replaced manual, email-based business processes with automated workflow and low-code applications utilizing Microsoft Power Automate and Power Apps\n• Utilize Azure DevOps Repos for version control, CI/CD pipelines, and collaborative code reviews\n• Collaborate with cross-functional teams to gather requirements, troubleshoot issues, and deploy updates efficiently",
            'order' => 1,
        ]);

        Experience::create([
            'company' => 'New Mexico State University',
            'position' => 'Enterprise Programmer Analyst Associate',
            'location' => 'Las Cruces, NM',
            'start_date' => '2020-06-01',
            'end_date' => '2022-04-01',
            'current' => false,
            'description' => "• Developed and supported multiple enterprise web applications using Laravel, JavaScript, HTML, CSS, and Oracle/MySQL databases\n• Handled full application lifecycle including development, deployment, maintenance, and end-user support\n• Used GitLab for version control and TeamCity for automated deployments",
            'order' => 2,
        ]);

        Experience::create([
            'company' => 'New Mexico State University',
            'position' => 'Co-op Software Developer',
            'location' => 'Las Cruces, NM',
            'start_date' => '2020-01-01',
            'end_date' => '2020-05-01',
            'current' => false,
            'description' => "• Led the redesign of a university-wide security access request application\n• Improved usability, performance, and efficiency of access request workflows\n• Delegated tasks and coordinated documentation, mockups, and development efforts",
            'order' => 3,
        ]);

        Experience::create([
            'company' => 'Bechtel Power Corporation',
            'position' => 'Oracle DBA Intern',
            'location' => 'Glendale, AZ',
            'start_date' => '2019-06-01',
            'end_date' => '2019-08-01',
            'current' => false,
            'description' => "• Monitored and maintained Oracle database systems and Linux servers\n• Automated system health checks by developing Python scripts for production environments\n• Applied patches and resolved system warnings to ensure operational stability",
            'order' => 4,
        ]);

        // Add Education
        Education::create([
            'institution' => 'New Mexico State University',
            'degree' => 'Bachelor of Science',
            'field_of_study' => 'Computer Science',
            'location' => 'Las Cruces, NM',
            'start_date' => '2016-08-01',
            'end_date' => '2020-05-01',
            'order' => 1,
        ]);

        Education::create([
            'institution' => 'New Mexico State University',
            'degree' => 'Bachelor of Arts',
            'field_of_study' => 'Psychology',
            'location' => 'Las Cruces, NM',
            'start_date' => '2016-08-01',
            'end_date' => '2020-05-01',
            'order' => 2,
        ]);

        // Add Technical Skills
        $skills = [
            // Languages
            ['name' => 'PHP', 'category' => 'Languages', 'proficiency' => 90, 'order' => 1],
            ['name' => 'JavaScript (ES6)', 'category' => 'Languages', 'proficiency' => 90, 'order' => 2],
            ['name' => 'Python', 'category' => 'Languages', 'proficiency' => 75, 'order' => 3],
            ['name' => 'SQL', 'category' => 'Languages', 'proficiency' => 85, 'order' => 4],
            ['name' => 'HTML5', 'category' => 'Languages', 'proficiency' => 95, 'order' => 5],
            ['name' => 'CSS3', 'category' => 'Languages', 'proficiency' => 90, 'order' => 6],
            ['name' => 'SASS', 'category' => 'Languages', 'proficiency' => 80, 'order' => 7],
            ['name' => 'C/C++', 'category' => 'Languages', 'proficiency' => 60, 'order' => 8],

            // Frameworks & Libraries
            ['name' => 'Laravel', 'category' => 'Frameworks & Libraries', 'proficiency' => 95, 'order' => 9],
            ['name' => 'Vue.js (Vue 3)', 'category' => 'Frameworks & Libraries', 'proficiency' => 90, 'order' => 10],
            ['name' => 'jQuery', 'category' => 'Frameworks & Libraries', 'proficiency' => 85, 'order' => 11],

            // Databases
            ['name' => 'MS SQL Server', 'category' => 'Databases', 'proficiency' => 85, 'order' => 12],
            ['name' => 'MySQL', 'category' => 'Databases', 'proficiency' => 90, 'order' => 13],
            ['name' => 'Oracle SQL', 'category' => 'Databases', 'proficiency' => 80, 'order' => 14],

            // DevOps & Tools
            ['name' => 'GitHub', 'category' => 'DevOps & Tools', 'proficiency' => 90, 'order' => 15],
            ['name' => 'GitLab', 'category' => 'DevOps & Tools', 'proficiency' => 85, 'order' => 16],
            ['name' => 'Azure DevOps', 'category' => 'DevOps & Tools', 'proficiency' => 85, 'order' => 17],
            ['name' => 'CI/CD Pipelines', 'category' => 'DevOps & Tools', 'proficiency' => 80, 'order' => 18],

            // Platforms & Other
            ['name' => 'Microsoft Power Platform', 'category' => 'Platforms', 'proficiency' => 80, 'order' => 19],
            ['name' => 'Power Automate', 'category' => 'Platforms', 'proficiency' => 85, 'order' => 20],
            ['name' => 'Power Apps', 'category' => 'Platforms', 'proficiency' => 80, 'order' => 21],
            ['name' => 'Linux', 'category' => 'Platforms', 'proficiency' => 75, 'order' => 22],
            ['name' => 'REST APIs', 'category' => 'Other', 'proficiency' => 90, 'order' => 23],
            ['name' => 'Role-Based Access Control', 'category' => 'Other', 'proficiency' => 90, 'order' => 24],
            ['name' => 'Report Generation (PDF/Excel)', 'category' => 'Other', 'proficiency' => 85, 'order' => 25],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Add Notable Projects (based on experience description)
        Project::create([
            'name' => 'Tradeshow Portal System',
            'description' => 'Large-scale tradeshow portal supporting exhibitor management, attendee registration, and real-time data synchronization. Replaced and modernized a legacy system with modern full-stack architecture.',
            'technologies' => ['Laravel', 'Vue 3', 'MySQL', 'Azure DevOps', 'SSO'],
            'start_date' => '2022-04-01',
            'order' => 1,
        ]);

        Project::create([
            'name' => 'Business Process Automation Suite',
            'description' => 'Automated workflow and low-code applications that replaced manual, email-based business processes. Improved efficiency and reduced errors across multiple departments.',
            'technologies' => ['Power Automate', 'Power Apps', 'Microsoft Power Platform'],
            'start_date' => '2022-04-01',
            'order' => 2,
        ]);

        Project::create([
            'name' => 'Security Access Request Application',
            'description' => 'Led the redesign of a university-wide security access request application. Improved usability, performance, and efficiency of access request workflows.',
            'technologies' => ['Laravel', 'JavaScript', 'Oracle SQL'],
            'start_date' => '2020-01-01',
            'end_date' => '2020-05-01',
            'order' => 3,
        ]);
    }
}
