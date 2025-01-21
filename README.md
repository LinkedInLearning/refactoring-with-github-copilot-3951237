# Refactoring with GitHub Copilot
This is the repository for the LinkedIn Learning course `Refactoring with GitHub Copilot`. The full course is available from [LinkedIn Learning][lil-course-url].

![lil-thumbnail-url]

GitHub Copilot can create code, but it can also help you improve, clean up, and remove existing code. Refactoring is a crucial but often challenging aspect of maintaining applications, and Copilot can make it easier for you to explore how code changes might look. In this course, instructor Gary Kovar takes you through using Copilot in a few different situations, working with different aspects of programming. Learn how Copilot might (or might not) fit your set of challenges.

Learning objectives
- Learn how to make small refactors in your PRs.
- Find out how to use GitHub Copilot to help refactor code.
- Be ready to defend larger refactors to your management and team.


_See the readme file in the main branch for updated instructions and information._

## Instructions
This repository has branches for each of the videos in the course. You can use the branch pop up menu in github to switch to a specific branch and take a look at the course at that stage, or you can add `/tree/BRANCH_NAME` to the URL to go to the branch you want to access.

## Branches
The branches are structured to correspond to the videos in the course. The naming convention is `CHAPTER#_MOVIE#`. As an example, the branch named `02_03` corresponds to the second chapter and the third video in that chapter. 
Some branches will have a beginning and an end state. These are marked with the letters `b` for "beginning" and `e` for "end". The `b` branch contains the code as it is at the beginning of the movie. The `e` branch contains the code as it is at the end of the movie. The `main` branch holds the final state of the code when in the course.

When switching from one exercise files branch to the next after making changes to the files, you may get a message like this:

    error: Your local changes to the following files would be overwritten by checkout:        [files]
    Please commit your changes or stash them before you switch branches.
    Aborting

To resolve this issue:
	
    Add changes to git using this command: git add .
	Commit changes using this command: git commit -m "some message"

## Instructor

Gary Kovar

Senior Back-End Developer and Software Engineer

                            

Check out my other courses on [LinkedIn Learning](https://www.linkedin.com/learning/instructors/gary-kovar?u=104).


[0]: # (Replace these placeholder URLs with actual course URLs)

[lil-course-url]: https://www.linkedin.com/learning/refactoring-with-github-copilot
[lil-thumbnail-url]: https://media.licdn.com/dms/image/v2/D4D0DAQGa7-pHyoRfbQ/learning-public-crop_675_1200/learning-public-crop_675_1200/0/1736207070451?e=2147483647&v=beta&t=8R-IdFwJGG075cuZy4J1CTXwtemXlXr3H7riX-9Qra4
