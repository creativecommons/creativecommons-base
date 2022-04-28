# Contributing to CC Open Source

Thank you for your interest in contributing to CC Open Source! This document is
a set of guidelines to help you contribute to this project.


## Code of Conduct

By participating in this project, you are expected to uphold our [Code of
Conduct][code_of_conduct].

[code_of_conduct]: https://opensource.creativecommons.org/community/code-of-conduct/


## Project Documentation

The `README` in the root of the repository should contain or link to project
documentation. If you cannot find the documentation you're looking for, please
file a GitHub issue with details of what you'd like to see documented.


## How to Contribute

Please follow the processes in our general [Contributing Code][contributing]
guidelines on the Creative Common Open Source website.

[contributing]: https://opensource.creativecommons.org/contributing-code/


## Questions or Thoughts?

Talk to us on [one of our community forums][community].

[community]: https://opensource.creativecommons.org/community/


## Development

The following tools are recommended when setting up a development environment.

- Docker / docker-compose


### Setting environment variables

Copy the file `/development/.env.example` to `/development/.env` and change the variables to desired values (or leave as they are.)


### Running the development server

Once you have installed the dependencies and configured the environment variables, run the development server with the following command from within the `/development/` folder:

```sh
docker-compose up
```
