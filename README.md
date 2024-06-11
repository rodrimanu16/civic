# Project Civic: PHP Docker app challenge
This is a sample php application based on Docker. The main goal is for the mentee to learn:
 - How to troubleshoot missing traces issues 
 - How to troubleshoot log&trace correlation issues in php/docker environment
 - How to parse logs correctly

How does the app works? The app is a landing page in localhost:8000 with a button that leads to an error page when pressed more than 5 times. 

## Challenge 1 

Challenge 1 would be for the mentee to identify why traces are not reaching the Datadog Agent. 

**Solution:** the issue would be the identifying the variable DD_AGENT_HOST should correspond to the name of the Agent container (in this case, datadog-agent and not dd-agent). 

They can look at php info for this and identify the issue. Also tracer startup logs should say something like 
[ddtrace] [startup] DATADOG TRACER CONFIGURATION - {"agent_error":"Failed to connect to localhost port 8126: Connection refused" 

**Material they should read:**
https://datadoghq.atlassian.net/wiki/spaces/TS/pages/346559487/Troubleshooting+APM+Configuration+with+Containers 
https://docs.datadoghq.com/containers/docker/apm/?tab=linux 

## Challenge 2
Now that logs and traces are reaching Datadog, the idea would be to correlate them. 

Solution: they should add DD_LOGS_INJECTION=true and that should do it. 


## Challenge 3 
Now that log and traces are correlated, last challenge would be to create a pipeline to parse the logs. 
We expect logs to have the correct message and status. 

They can base themselves in the ootb Apache pipeline
