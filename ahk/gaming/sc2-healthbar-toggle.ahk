#SingleInstance force
#MaxThreadsPerHotkey 1

showing_health_bars := false

Alt up::
  if not showing_health_bars
  {
    Send, {\ down}
    Send, {[ down}
    Send, {] down}
    showing_health_bars := true
  }
  else
  {
    Send, {\ up}
    Send, {[ up}
    Send, {] up}
    showing_health_bars := false
  }
  