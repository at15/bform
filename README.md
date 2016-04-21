# bform
Paper and data management web application for plastic forming

This project is related to my thesis in SJTU [SMSE](http://en.smse.sjtu.edu.cn/) (School of Material Science and Engineering).
It is used to collect and index papers related with plastic forming, especially forming limit theory and diagram. Further more,
model and experiment data can be attached to related paper, you can play with the model if you have added runnable code. For
researchers who use FEM a lot, you can run simulation on server to validate theories from papers, though it might requires
a lot of config for the first time, but once you have it up and running, you no longer need to keep your laptop open.

## Develop

In order to simplify travis ci settings, the project has three repos.

- API is in [bform-api](https://github.com/at15/bform-api)
- Backend is in [this repo](https://github.com/at15/bform)
- Frontend is in [bform-web](https://github.com/at15/bform-web) 

## Features

- Paper store, index and share.
- Attach model to paper, ie: R Hill 1948, Swift
- Attach experiment data to paper
- Export, import model and data
- Visualization for theory development
- Run `MatLab` and `Cpp` code on server and show graph in browser
- Run pre-configured FEM using `Dynaform`, `Abaquas` etc on server, and show/download result.

## RoadMap

### 0.1.0

- upload paper
- index using elasticsearch
- share paper
- auto deploy

### 0.2.0

- syntax for describe model
- comment on paper
- attach model to paper manually
- abstract author and press from paper
- visualize

### 0.3.0

- run `Cpp` code
- run `MatLab` code
- run `Dynaform` on linux server

### 0.4.0

- turn the server to a collaborate platform
- write latex
- paper review
- real time chat

## Contribute

PR and issue are not welcomed, please use your valuable time on other interesting projects, don't waste it on this one.

## License

Apache2.0

